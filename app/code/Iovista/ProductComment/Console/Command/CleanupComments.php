<?php
declare(strict_types=1);

namespace Iovista\ProductComment\Console\Command;

use Iovista\ProductComment\Model\ProductComment;
use Magento\Framework\App\ResourceConnection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CleanupComments extends Command
{
    private const COMMAND_NAME = 'product:comment:cleanup';
    private const DEFAULT_DAYS = 5;

    /**
     * @var ResourceConnection
     */
    private $resourceConnection;

    public function __construct(ResourceConnection $resourceConnection, ?string $name = null)
    {
        $this->resourceConnection = $resourceConnection;
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription('Delete disapproved product comments older than 10 days.');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('product_comment');

        $thresholdDate = (new \DateTimeImmutable(
            sprintf('-%d days', self::DEFAULT_DAYS),
            new \DateTimeZone('UTC')
        ))->format('Y-m-d H:i:s');

        $where = [
            'status = ?' => ProductComment::STATUS_NOT_APPROVED,
            'created_at < ?' => $thresholdDate,
        ];

        $deletedRows = $connection->delete($tableName, $where);

        $output->writeln(
            sprintf(
                '<info>Cleanup complete. Deleted %d disapproved comment(s) older than %d days.</info>',
                (int) $deletedRows,
                self::DEFAULT_DAYS
            )
        );

        return Command::SUCCESS;
    }
}

