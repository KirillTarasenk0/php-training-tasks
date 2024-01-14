#Задание 1
SELECT products.productName, orderdetails.quantityOrdered, orderdetails.priceEach FROM orderdetails
INNER JOIN products ON orderdetails.productCode = products.productCode
WHERE orderdetails.orderNumber = 10100;
#Задание 2
SELECT orders.orderDate, orders.status, CONCAT(customers.contactFirstName, ' ', customers.contactLastName) AS customerFullName, customers.phone, SUM(orderdetails.quantityOrdered) as generalQuantityOrdered, SUM((orderdetails.priceEach * orderdetails.quantityOrdered)) AS generalOrderSum FROM orders
INNER JOIN customers ON orders.customerNumber = customers.customerNumber
INNER JOIN orderdetails ON orders.orderNumber = orderdetails.orderNumber
WHERE orders.orderNumber = 10100;
#Задание 3
SELECT products.productLine, COUNT(*) AS productCount FROM products WHERE products.productLine NOT LIKE '%car%' GROUP BY products.productLine HAVING COUNT(*) > 10;
#Задание 4
SELECT CONCAT(customers.contactFirstName, ' ', customers.contactLastName) as userName, SUM(payments.amount) AS generalOrdersCost FROM payments
INNER JOIN customers ON payments.customerNumber = customers.customerNumber
GROUP BY userName
ORDER BY generalOrdersCost DESC LIMIT 1;