CREATE TABLE IF NOT EXISTS vendors (
    vendorId INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    vendorName varchar(255) DEFAULT NULL
);
CREATE TABLE contacts (
    contactId int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    contactData varchar(255) DEFAULT NULL,
    FOREIGN KEY (contactId) REFERENCES vendors (vendorId) ON DELETE CASCADE ON UPDATE NO ACTION
);
CREATE TABLE uniteVendorContact (
    vendorId int DEFAULT NULL,
    contactId int DEFAULT NULL,
    FOREIGN KEY (contactId) REFERENCES contacts (contactId) ON DELETE CASCADE ON UPDATE NO ACTION,
    FOREIGN KEY (vendorId) REFERENCES vendors (vendorId) ON DELETE CASCADE ON UPDATE NO ACTION
);
INSERT INTO vendors (vendorName) VALUES ('Vendor1'), ('Vendor2'), ('Vendor3');
INSERT INTO contacts VALUES (1, 'vendor1@mail.com'), (2, 'vendor2@mail.com'), (3, 'vendor3@mail.com');
INSERT INTO uniteVendorContact VALUES (1, 1), (2, 2), (3, 3);