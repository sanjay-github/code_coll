Build a stand-alone (Iovista_ProductComment) extension that will not affect any other
functionality.

Requirements:
1.​ Add configuration in admin panel to enable/disable extension
Done

2.​ Create a custom extension/module with the name “ioVista ProductComment”
Done

3.​ Create a Product Comment feature.
Done

4.​ Add a form on Product Detail Page (PDP) where users can submit:
a.​ Name
b.​ Email
c.​ Comment
Done

5.​ Save data into a custom database table.(product_comment)
a.​ comment_id
b.​ product_id
c.​ name
d.​ email
e.​ comment
f.​ Created_at
Done

6.​ Create Admin Grid for comments.
a.​ Marketing → Product Comments
Grid should include:
●​ Comment ID
●​ Product Name
●​ Name
●​ Email
●​ Comment
●​ Created At
●​ Status (Approve / Pending)
- In progress

7.​ Admin should be able to:
a.​ Approve / Reject comment
b.​ Delete comment

8.​ Create custom CLI command:
a.​ php bin/magento product:comment:cleanup
b.​ Delete comments older than 30 days.
- Pending

9.​ Create a REST API
a.​ GET /V1/product-comments/:productId
i.​ Return comments for that product.[
{
"name": "John",
"comment": "Good product",
"created_at": "2026-03-05"
}
]
- Pending

10.​ Please share a command to export the database from the Cloud?
mysqldump -u [username] -p [database_name] | gzip > [database_name.sql.gz]

11.​ Use of below files in Adobe Commerce Cloud.
a.​ .magento.env.yaml
 - It is used to manage environment-specific variables.
b.​ routes.yaml
- It is used to define routes for the site.

c.​ Services.yaml
- Used to configure services like redis etc.

12.​ How can we export the configuration and import the configuration?
You can use command "bin/magento app:config:dump" to export configurations.
Use command "php bin/magento app:config:import" to import configurations.

13.​ How can we connect to Adobe Commerce Cloud SSH?
You can get ssh details from adobe dashboard.

14.​ I need to list out all the environment list.
integration, staging, production.
