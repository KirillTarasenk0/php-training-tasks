#Задание 1
SELECT CONCAT(contactFirstName, ' ' ,contactLastName) AS nameAndSurname, phone, country FROM customers WHERE country = 'USA' AND creditLimit > 50000;
#Задание 2
SELECT CONCAT(contactFirstName, ' ' ,contactLastName) AS nameAndSurname, paymentDate, checkNumber FROM customers, payments WHERE customers.customerNumber = payments.customerNumber AND payments.paymentDate > '2004-12-12' ORDER BY payments.paymentDate;
#Задание 3
SELECT CONCAT(customers.contactFirstName, ' ' ,customers.contactLastName) AS nameAndSurname, orders.orderNumber, orders.customerNumber, orders.orderDate FROM customers, orders WHERE  customers.customerNumber = orders.customerNumber AND customers.city = 'NYC';
#Задание 4
SELECT * FROM products WHERE products.quantityInStock < 100 ORDER BY products.buyPrice;
#Задание 5
SELECT DISTINCT productlines.productLine, productlines.textDescription FROM products, productlines WHERE products.productLine = productlines.productLine AND productlines.productLine LIKE '%car%' OR products.productName LIKE '%car%';
#Задание 6
SELECT productlines.* FROM productlines, products WHERE productlines.productLine = products.productLine AND products.buyPrice = (SELECT products.buyPrice FROM products ORDER BY products.buyPrice ASC LIMIT 1);