Практика
- Получить название товаров, кол-во их в заказе и цену товара при заказе для заказа 10100.
- Получить полную информацию о заказе 10100. Ответ должен включать в себя: Дату заказа, статус заказа, имя покупателя, телефон покупателя, кол-во позиций (товаров), общую сумму заказа.
- Получить кол-во товаров в каждой "не автомобильной" категории, где кол-во больше 10
- Необязательно: Получить название покупателя с наибольшей совокупной стоимостью заказов за все время

Задача на приведение бд к нормализации 

Дана таблица

VendorId	VendorName	Contact

1	Vendor1	vendor1@mail.com

2	Vendor2	vendor2@mail.com

3	Vendor3	vendor1@mail.com

Представьте, что вам сказали, что теперь у вендора может быть много контактных email

Например:

VendorId	VendorName	Contact

1	Vendor1	vendor1@mail.com, vendor1_additional@mail.com

2	Vendor2	vendor2@mail.com, vendor2_info@mail.com

3	Vendor3	vendor1@mail.com

Приведите данную таблицу к 3 нф.