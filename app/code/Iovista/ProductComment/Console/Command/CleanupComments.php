<?php
declare(strict_types=1);

namespace Iovista\ProductComment\Console\Command;

use Iovista\ProductComment\Model\ProductComment;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\ResourceConnection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CleanupComments extends Command
{
    private const COMMAND_NAME = 'product:comment:cleanup';
    private const XML_PATH_CLEANUP_DAYS = 'catalog/productComment/cleanup_days';
    private const DEFAULT_DAYS = 10;

    /**
     * @var ResourceConnection
     */
    private $resourceConnection;
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ResourceConnection $resourceConnection,
        ScopeConfigInterface $scopeConfig,
        ?string $name = null
    )
    {
        $this->resourceConnection = $resourceConnection;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription('Delete disapproved product comments older than configured number of days.');
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $days = (int) $this->scopeConfig->getValue(self::XML_PATH_CLEANUP_DAYS);
        if ($days <= 0) {
            $days = self::DEFAULT_DAYS;
        }

        if ($days <= 0) {
            $output->writeln('<error>Cleanup days must be a positive integer.</error>');
            return Command::INVALID;
        }

        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('product_comment');

        $thresholdDate = (new \DateTimeImmutable(
            sprintf('-%d days', $days),
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
                $days
            )
        );

        return Command::SUCCESS;
    }
}

