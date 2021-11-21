-- Database: `shoppinglistdb`

-- Table structure for table `shopping_list`
--

CREATE TABLE `shopping_list` (
  `item_no` int(11) NOT NULL,
  `Item_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_list`
--

INSERT INTO `shopping_list` (`item_no`, `Item_name`) VALUES
(1, 'Butter');

-- Indexes for table `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`item_no`);


ALTER TABLE `shopping_list`
  MODIFY `item_no` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

GRANT SELECT, INSERT, DELETE, UPDATE
ON shoppinglistdb.*
TO root@localhost
IDENTIFIED BY '';
