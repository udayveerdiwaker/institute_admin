-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2026 at 09:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_number` varchar(10) NOT NULL,
  `question_text` varchar(200) NOT NULL,
  `sub` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_number`, `question_text`, `sub`, `created_at`) VALUES
(1, '1', 'Microsoft word is ____ software.?', 'Computer', '2026-01-16 08:36:48'),
(2, '2', 'Which is not in MS Word?', 'Computer', '2026-01-16 08:36:48'),
(3, '3', 'Which is not an edition of MS Word?', 'Computer', '2026-01-16 08:36:48'),
(4, '4', 'What is the blank space outside the printing area on a page?', 'Computer', '2026-01-16 08:36:48'),
(5, '5', 'The ability to combine name and addresses with a standard document is called ________', 'Computer', '2026-01-16 08:36:48'),
(6, '6', 'The valid format of MS Word is ___?.', 'Computer', '2026-01-16 08:36:48'),
(7, '7', '_____ is the change the way text warps around the selected object.', 'Computer', '2026-01-16 08:36:48'),
(8, '8', 'In the _____ we can change the view of the document and set the zoom option.', 'Computer', '2026-01-16 08:36:48'),
(9, '9', 'What is thw default font of a Microsoft word 2007 Document.', 'Computer', '2026-01-16 08:36:48'),
(10, '10', 'Which Option is not available in the page setup group of page layout tab ', 'Computer', '2026-01-16 08:36:48'),
(11, '11', 'Which of the following language does the computer understand?', 'Computer', '2026-01-16 08:36:48'),
(12, '12', 'Which of the following unit is responsible for converting the data received from the user into a computer understandable format?', 'Computer', '2026-01-16 08:36:48'),
(13, '13', 'Which of the following is the correct abbreviation of COMPUTER?', 'Computer', '2026-01-16 08:36:48'),
(14, '14', 'What menu is selected to print ?', 'Computer', '2026-01-16 08:36:48'),
(15, '15', 'Which of the following are physical devices of a computer?', 'Computer', '2026-01-16 08:36:48'),
(16, '16', 'Who is the father of Computers?', 'Computer', '2026-01-16 08:36:48'),
(17, '17', 'It is done by CTRL+E .', 'Computer', '2026-01-16 08:36:48'),
(18, '18', 'It is done by CTRL+F .', 'Computer', '2026-01-16 08:36:48'),
(19, '19', 'Which of the following is a shortcut key for \"spelling and Grammar ?  ', 'Computer', '2026-01-16 08:36:48'),
(20, '20', 'Two Kinds of Main Memory are ?', 'Computer', '2026-01-16 08:36:48'),
(21, '21', 'What is MS Excel?', 'Computer', '2026-01-16 08:36:48'),
(22, '22', 'What is the row limit of MS Excel 2019? ', 'Computer', '2026-01-16 08:36:48'),
(23, '23', 'In Microsoft Excel spreadsheets, rows are designated as _______?', 'Computer', '2026-01-16 08:36:48'),
(24, '24', 'The Greater Than sign (>) exemplifies a/an _____ operator.', 'Computer', '2026-01-16 08:36:48'),
(25, '25', '____ is the correct syntax of IF() Function. ', 'Computer', '2026-01-16 08:36:48'),
(26, '26', 'Why is the =COUNTIF function in Excel used? ', 'Computer', '2026-01-16 08:36:48'),
(27, '27', 'What do Excel formulas start with? ', 'Computer', '2026-01-16 08:36:48'),
(28, '28', 'How to Open the Insert hyperlink dialog box? ', 'Computer', '2026-01-16 08:36:48'),
(29, '29', 'What is shortcut key to open an existing workbook?', 'Computer', '2026-01-16 08:36:48'),
(30, '30', 'What is Excel used for?', 'Computer', '2026-01-16 08:36:48'),
(31, '31', 'What is the Max Zoom percentage in MS PowerPoint?', 'Computer', '2026-01-16 08:36:48'),
(32, '32', 'In the current presentation, if we want to insert a new slide, we can choose which of these?', 'Computer', '2026-01-16 08:36:48'),
(33, '33', 'Which of the following fill effects can be used to fill the background of the slide?', 'Computer', '2026-01-16 08:36:48'),
(34, '34', 'Slides Are prepared in ?', 'Computer', '2026-01-16 08:36:48'),
(35, '35', 'In power point, Themes could befound Under- ', 'Computer', '2026-01-16 08:36:48'),
(36, '36', 'In Ms powerpoint ,key used to run the slide show from the beginning is -', 'Computer', '2026-01-16 08:36:48'),
(37, '37', 'Which type of view is not present in MS-PowerPoint? ', 'Computer', '2026-01-16 08:36:48'),
(38, '38', 'Which of the Following Sortcut keys is used to end a Powerpoint Persentation? ', 'Computer', '2026-01-16 08:36:48'),
(39, '39', 'What do we use if we want to add texts in a given slide?', 'Computer', '2026-01-16 08:36:48'),
(40, '40', 'From which of these menus can we access a Text Box, Picture, Chart etc.?', 'Computer', '2026-01-16 08:36:48'),
(41, '41', 'which of the following shortcut key to open new Blank Document in ms word ? ', 'Computer', '2026-01-16 08:36:48'),
(42, '42', 'In how many generation a computer can be classified ?', 'Computer', '2026-01-16 08:36:48'),
(43, '43', 'Fifth genration computer are based on ? ', 'Computer', '2026-01-16 08:36:48'),
(44, '44', 'Which one of the Following is an example of oprating system ? ', 'Computer', '2026-01-16 08:36:48'),
(45, '45', 'Which of the following is the powerful type of the computer ?', 'Computer', '2026-01-16 08:36:48'),
(46, '46', 'Which one is not an input device?', 'Computer', '2026-01-16 08:36:48'),
(47, '47', '____ is not a function in Excel.', 'Computer', '2026-01-16 08:36:48'),
(48, '48', 'What we have to type in the Run dialog box to open Powerpoint?', 'Computer', '2026-01-16 08:36:48'),
(49, '49', 'In PowerPoint, is it allowed to make a PDF of the powerpoint presentation?', 'Computer', '2026-01-16 08:36:48'),
(50, '50', 'What does CPU stand for?', 'Computer', '2026-01-16 08:36:48'),
(51, '51', 'Who invented c programming language?', 'C', '2026-01-16 08:36:48'),
(52, '52', 'Which of the following is not a valid C variable name?', 'C', '2026-01-16 08:36:48'),
(53, '53', 'All keywords in C are in ____________', 'C', '2026-01-16 08:36:48'),
(54, '54', 'What is the 16-bit compiler allowable range for integer constants?', 'C', '2026-01-16 08:36:48'),
(55, '55', '#include <stdio.h>\nstruct School {\n    int age, rollNo;\n};\nvoid solve() {\n    struct School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    printf(\"%d %d\", sc.age, sc.rollNo);\n}\nint main() {\n    solve();', 'C', '2026-01-16 08:36:48'),
(56, '56', '#include <stdio.h>\nvoid solve() {\n    int x = 2;\n    printf(\"%d\", (x << 1) + (x >> 1));\n}\nint main() {\n    solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(57, '57', '#include <stdio.h>\nvoid solve() {\n    int x = 1, y = 2;\n    printf(x > y ? \"Greater\" : x == y ? \"Equal\" : \"Lesser\");\n}\nint main() {\n    solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(58, '58', '#include <stdio.h>\nint main() {\n	int a = 3, b = 5;\n	int t = a;\n	a = b;\n	b = t;\n	printf(\"%d %d\", a, b);\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(59, '59', 'Which of the following is not a logical operator?', 'C', '2026-01-16 08:36:48'),
(60, '60', 'Which of the following operators can be applied on structure variables?', 'C', '2026-01-16 08:36:48'),
(61, '61', 'What does the `sizeof` operator in C return?', 'C', '2026-01-16 08:36:48'),
(62, '62', 'In C, which function is used to close a file?', 'C', '2026-01-16 08:36:48'),
(63, '63', '#include <stdio.h>\nvoid solve() {\n    int ch = 2;\n    switch(ch) {\n        case 1: printf(\"1 \");\n        case 2: printf(\"2 \");\n        case 3: printf(\"3 \");\n        default: printf(\"None\");\n    }\n}\nin', 'C', '2026-01-16 08:36:48'),
(64, '64', '#include <stdio.h>\nvoid solve() {\n    int x = printf(\"Hello\");\n    printf(\" %d\", x);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(65, '65', 'int main() {\n	int sum = 2 + 4 / 2 + 6 * 2;\n	printf(\"%d\", sum);\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(66, '66', '#include <stdio.h>\nunion School {\n    int age, rollNo;\n    double marks;\n};\nvoid solve() {\n    union School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    sc.marks = 19.04;\n    printf(\"%d\", (int)sizeof(', 'C', '2026-01-16 08:36:48'),
(67, '67', ' Which of the following is not true about structs in C?', 'C', '2026-01-16 08:36:48'),
(68, '68', ' What is an example of iteration in C?', 'C', '2026-01-16 08:36:48'),
(69, '69', 'What is #include <stdio.h>?', 'C', '2026-01-16 08:36:48'),
(70, '70', 'What is the sizeof(char) in a 32-bit C compiler?', 'C', '2026-01-16 08:36:48'),
(71, '71', '#include <stdio.h>\nint main() {\n	int a[] = {1, 2, 3, 4};\n	int sum = 0;\n	for(int i = 0; i < 4; i++) {\n	    sum += a[i];\n	}\n	printf(\"%d\", sum);\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(72, '72', '#include <stdio.h>\nint main() {\n	 char str[] = \"Hello, World!\";\n\n    printf(\"%s\", str + 7);\n\n    return 0;\n}\n', 'C', '2026-01-16 08:36:48'),
(73, '73', '#include <stdio.h>\nint main() {\n	  int x = 5;\n\n    int y = (x++) + (++x);\n\n    printf(\"%d\", y);\n\n    return 0;\n}', 'C', '2026-01-16 08:36:48'),
(74, '74', '#include <stdio.h>\nint main() {\n	   int a = 10, b = 20, c;\n\n    c = a > b ? a : b;\n\n    printf(\"%d\", c);\n\n    return 0;\n}', 'C', '2026-01-16 08:36:48'),
(75, '75', 'What is the purpose of the `union` data type in C?', 'C', '2026-01-16 08:36:48'),
(76, '76', 'Which of the following standard C library functions is used for memory allocation and deallocation?', 'C', '2026-01-16 08:36:48'),
(77, '77', 'which operator is used to access the address of a variable?', 'C', '2026-01-16 08:36:48'),
(78, '78', 'What is the purpose of the `do?while` loop in C?', 'C', '2026-01-16 08:36:48'),
(79, '79', '#include <stdio.h>\nvoid solve() {\n    printf(\"%d %d\", (023), (23));\n}\nint main() {\n    solve();\n	return 0;\n}\n', 'C', '2026-01-16 08:36:48'),
(80, '80', '#include <stdio.h>\nvoid solve() {\n    int a = 3;\n    int res = a++ + ++a + a++ + ++a;\n    printf(\"%d\", res);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(81, '81', '#include <stdio.h>\n#include<string.h>\nvoid solve() {\n    char s[] = \"Hello\";\n    printf(\"%s \", s);\n    char t[40];\n    strcpy(t, s);\n    printf(\"%s\", t);\n}\nint main() {\n    solve();\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(82, '82', '#include <stdio.h>\nvoid solve(int x) {\n    if(x == 0) {\n        printf(\"%d \", x);\n        return;\n    }\n    printf(\"%d \", x);\n    solve(x - 1);\n    printf(\"%d \", x);\n}\nint main() {\n    solve(3);\n	retu', 'C', '2026-01-16 08:36:48'),
(83, '83', 'What is the purpose of the strcat function in C?', 'C', '2026-01-16 08:36:48'),
(84, '84', ' which operator is used for bitwise OR?', 'C', '2026-01-16 08:36:48'),
(85, '85', 'What is the purpose of the `static` keyword when applied to a local variable in C?', 'C', '2026-01-16 08:36:48'),
(86, '86', ' Which of the following data types in C has the highest storage size?', 'C', '2026-01-16 08:36:48'),
(87, '87', '#include <stdio.h>\nint main()\n{\nint i = 0;\ndo\n{\ni++;\nif(i == 2)\ncontinue;\nprintf(\"In while loop \");\n}\nwhile (i < 2);\nprintf(\"%d\\n\", i);\n}', 'C', '2026-01-16 08:36:48'),
(88, '88', '#include <stdio.h>\nint main()\n{\nint i = 0;\nwhile (i < 3)\ni++;\nprintf(\"In while loop\\n\");\n}', 'C', '2026-01-16 08:36:48'),
(89, '89', '#include <stdio.h>\nvoid main()\n{\nint x = 5 * 9 / 3 + 9;\nprintf(\"%d\\n\", x);\n}', 'C', '2026-01-16 08:36:48'),
(90, '90', '#include <stdio.h>\nint main()\n{\nint main = 3;\nprintf(\"%d\", main);\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(91, '91', 'Which of these won?t return any value?', 'C', '2026-01-16 08:36:48'),
(92, '92', 'Which of these keywords do we use for the declaration of the friend function?', 'C', '2026-01-16 08:36:48'),
(93, '93', 'What does polymorphism stand for?', 'C', '2026-01-16 08:36:48'),
(94, '94', 'Which container is the best for keeping a collection of various distinct elements?', 'C', '2026-01-16 08:36:48'),
(95, '95', '#include <iostream>\n\nint main()\n{\n if(0)\n {\n    std::cout<<\"Hi\";\n }\n else\n {\n    std::cout<<\"Bye\";\n }\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(96, '96', '#include<iostream>\n\nint main()\n{\nint a=10; \nstd::cout<<a++;\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(97, '97', '#include<iostream>\n\nint main()\n{\n    int i=0;\n    lbl:\n    std::cout<<\"CppBuzz.com\";\n    i++;\n    if(i<5)\n    {\n	goto lbl;\n    }\n\n    return 0;\n\n}', 'C', '2026-01-16 08:36:48'),
(98, '98', '#include <iostream>\nusing namespace std;\n\nint main()\n{\nint a = 10;\ncout<<a++;\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(99, '99', 'Can a for loop contain another for loop?', 'C', '2026-01-16 08:36:48'),
(100, '100', 'Which operator can not be overloaded in C++?', 'C', '2026-01-16 08:36:48'),
(101, '101', 'Which operator has highest precedence in below list in C++?', 'C', '2026-01-16 08:36:48'),
(102, '102', 'What is correct syntax of a for loop in C++?', 'C', '2026-01-16 08:36:48'),
(103, '103', 'int main()\n{\n  int a=10;\n  int b,c;\n  b = a++;\n  c = a;\n  std::cout<<a<<b<<c;\n  return 0;\n}', 'C', '2026-01-16 08:36:48'),
(104, '104', '#include<iostream>\nint main()\n{\n    int a = 1;\n    switch(a)\n    {\n    case 1: std::cout<<\"One\";\n    case 2: std::cout<<\"Two\";\n    case 3: std::cout<<\"Three\";\n    default: std::cout<<\"Default\";\n    }\n', 'C', '2026-01-16 08:36:48'),
(105, '105', '#include<iostream>\n\nint main()\n{\n\nstd::cout<<-1-1-1;\n\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(106, '106', '#include <iostream>\nusing namespace std;\n\nint main() \n{\nint x = 5;\n\nif(x++ == 5)\ncout<<\"Five\"<<endl;\nelse\nif(++x == 6)\ncout<<\"Six\"<<endl;\n\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(107, '107', 'What is abstract class?', 'C', '2026-01-16 08:36:48'),
(108, '108', 'Can a Structure contain pointer to itself?', 'C', '2026-01-16 08:36:48'),
(109, '109', 'In OOP, what does encapsulation refer to?', 'C', '2026-01-16 08:36:48'),
(110, '110', 'Which concept in OOP allows for the same function to be used in different ways based on the object it is associated with?', 'C', '2026-01-16 08:36:48'),
(111, '111', '#include<iostream>\nenum color\n{\n	black=1,\n	blue,\n	red	\n};\nint main()\n{\n    color obj = blue;\n    std::cout<<obj;\n	return 0;\n}', 'C', '2026-01-16 08:36:48'),
(112, '112', '#include<iostream>\nusing namespace std;\nenum color{\n	black,\n	blue,\n	red	\n};\nint main()\n{    \n    color obj;\n    cout<<sizeof(obj);\n    return 0;\n}  ', 'C', '2026-01-16 08:36:48'),
(113, '113', '#include<iostream>\nusing namespace std;\n\nint main()\n{\n int x = 9;\n while (x>0)\n x--;\n cout<<x;\n\nreturn 0;\n}', 'C', '2026-01-16 08:36:48'),
(114, '114', '#include <iostream>\nusing namespace std;\nclass TestingClass\n{\npublic:\nTestingClass(int x)\n{\n cout << x << endl; \n}\n\nTestingClass()\n{\n cout <<\"Hello!\"<< endl; \n}\n\n};\nint main()\n{\n TestingClass test(77)', 'C', '2026-01-16 08:36:48'),
(115, '115', 'Which is the correct command used to compile source code (.cpp files) into object code(.o files)?', 'C', '2026-01-16 08:36:48'),
(116, '116', 'Which member function of a class is called automatically when any object is created of that class?', 'C', '2026-01-16 08:36:48'),
(117, '117', 'What type of function is not a member of a class, but has access to the private members of the class.', 'C', '2026-01-16 08:36:48'),
(118, '118', 'Which of following allows us to create new classes based on existing classes.', 'C', '2026-01-16 08:36:48'),
(119, '119', '#include<iostream>\n#include<string.h>\nusing namespace std;\n\nint main()\n{\n    char one[]=\"one\";\n    char two[]=\"two\";\n    \n    if(one==two){\n        cout<<\"Equal\";\n    }\n    \n    if(strcmp(one, two)==0', 'C', '2026-01-16 08:36:48'),
(120, '120', '#include <iostream>\n\nusing namespace std;\n\nint main()\n\n {\n\n    int arr[5] = {1, 2, 3, 4, 5};\n\n    int *ptr = arr;\n\n    cout << *(ptr + 2) << endl;\n\n    return 0;\n\n}', 'C', '2026-01-16 08:36:48'),
(121, '121', '  How Many Groups Are Pre -Defined in Tally ?', 'Tally', '2026-01-16 08:36:48'),
(122, '122', ' Tally package is developed by ?', 'Tally', '2026-01-16 08:36:48'),
(123, '123', ' In General the Financial Year From shall be from?', 'Tally', '2026-01-16 08:36:48'),
(124, '124', ' Which option is used in Tally to make changes in created company ?', 'Tally', '2026-01-16 08:36:48'),
(125, '125', ' Which menu is used to create new ledger , group  and voucher types in Tally?', 'Tally', '2026-01-16 08:36:48'),
(126, '126', '  which Submenu is used for voucher entry in tally ?', 'Tally', '2026-01-16 08:36:48'),
(127, '127', '  Salary Account Comes Under Which Head ?', 'Tally', '2026-01-16 08:36:48'),
(128, '128', 'Tally is an example of which type of software?', 'Tally', '2026-01-16 08:36:48'),
(129, '129', '  Which ledger is created by Tally Automatically as soon as we create a new company ?', 'Tally', '2026-01-16 08:36:48'),
(130, '130', '  20,000 withdrawn from State Bank . In Which Voucher type this transation will be recorded ?', 'Tally', '2026-01-16 08:36:48'),
(131, '131', '  Where do we record transactions of salary, rent or interest paid ?', 'Tally', '2026-01-16 08:36:48'),
(132, '132', ' Where do we record credit purchase of furniture in tally?', 'Tally', '2026-01-16 08:36:48'),
(133, '133', ' Which of the following equation is true for balance sheet ?', 'Tally', '2026-01-16 08:36:48'),
(134, '134', ' How Many Options Related to company features are there in \"F11: Freatures\" in tally ', 'Tally', '2026-01-16 08:36:48'),
(135, '135', ' Which option is used to view trial balance from gateway of Tally ?', 'Tally', '2026-01-16 08:36:48'),
(136, '136', ' What does ?F11? key stand for in Tally?', 'Tally', '2026-01-16 08:36:48'),
(137, '137', 'Default \'Godown\' name in tally is?', 'Tally', '2026-01-16 08:36:48'),
(138, '138', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally', '2026-01-16 08:36:48'),
(139, '139', ' Which menu in Tally allows you to view reports such as balance sheets and profit & loss statements?', 'Tally', '2026-01-16 08:36:48'),
(140, '140', ' What is the full form of ERP in Tally ERP 9?', 'Tally', '2026-01-16 08:36:48'),
(141, '141', ' In Tally, what is the use of \"Alt + C\"?', 'Tally', '2026-01-16 08:36:48'),
(142, '142', ' In Tally, where do you configure payroll features?', 'Tally', '2026-01-16 08:36:48'),
(143, '143', ' Which of the following ledgers cannot be deleted in Tally?', 'Tally', '2026-01-16 08:36:48'),
(144, '144', ' In Tally, which type of ledger is \"Sundry Debtors\"?', 'Tally', '2026-01-16 08:36:48'),
(145, '145', ' If a company purchases goods worth ?10,000 on credit, what would the journal entry be?', 'Tally', '2026-01-16 08:36:48'),
(146, '146', ' In Tally, what is the correct journal entry to record the purchase of furniture on credit?', 'Tally', '2026-01-16 08:36:48'),
(147, '147', ' Which voucher is used to record the return of goods to a supplier in Tally?', 'Tally', '2026-01-16 08:36:48'),
(148, '148', ' Which shortcut key is used to record a Credit Note Voucher in Tally?', 'Tally', '2026-01-16 08:36:48'),
(149, '149', ' Which of the following is not recorded in a Contra Voucher?', 'Tally', '2026-01-16 08:36:48'),
(150, '150', ' Which of the following is NOT a component of Tally?', 'Tally', '2026-01-16 08:36:48'),
(151, '151', ' In Tally, what does the \"F12: Configure\" option do?', 'Tally', '2026-01-16 08:36:48'),
(152, '152', ' Which shortcut key is used to change the date in Tally?', 'Tally', '2026-01-16 08:36:48'),
(153, '153', ' Which voucher is used to record personal drawings (owner withdrawing money for personal use) from the business?', 'Tally', '2026-01-16 08:36:48'),
(154, '154', ' Which Option is user to view to stock Group and Stock Summery ', 'Tally', '2026-01-16 08:36:48'),
(155, '155', ' We can Modify an exsiting company from ?', 'Tally', '2026-01-16 08:36:48'),
(156, '156', ' In Tally, which of the following is considered a real account?', 'Tally', '2026-01-16 08:36:48'),
(157, '157', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally', '2026-01-16 08:36:48'),
(158, '158', ' Which of the following is not a feature of Tally ?', 'Tally', '2026-01-16 08:36:48'),
(159, '159', ' Which of the following keys is used to Delete in ledger ?', 'Tally', '2026-01-16 08:36:48'),
(160, '160', 'Which of the following is the Predefined  stock category in Tally?', 'Tally', '2026-01-16 08:36:48'),
(161, '161', ' Which of the following can be managed using Tally?', 'Tally', '2026-01-16 08:36:48'),
(162, '162', 'What  shortcut key is journal Vaucher ?', 'Tally', '2026-01-16 08:36:48'),
(163, '163', ' What is the primary file extension used for Tally data files ?', 'Tally', '2026-01-16 08:36:48'),
(164, '164', 'The Short key of company creation ?', 'Tally', '2026-01-16 08:36:48'),
(165, '165', ' Which feature in Tally allows you to define custom invoice formats?', 'Tally', '2026-01-16 08:36:48'),
(166, '166', ' Which characteristic of Tally allows it to be user-friendly ?', 'Tally', '2026-01-16 08:36:48'),
(167, '167', ' What does Tally?s \'User Management\' feature allow ?', 'Tally', '2026-01-16 08:36:48'),
(168, '168', ' We can get the report of Interest From ?', 'Tally', '2026-01-16 08:36:48'),
(169, '169', ' Single entry mode Applicable for ?', 'Tally', '2026-01-16 08:36:48'),
(170, '170', ' Goods Returning to a Creditor after challan but before bill we need to pass?', 'Tally', '2026-01-16 08:36:48'),
(171, '171', ' What is Corel draw ?', 'Coreldraw', '2026-01-16 08:36:48'),
(172, '172', 'Which of the following is are the advantage(s) of Coreldraw Graphics?', 'Coreldraw', '2026-01-16 08:36:48'),
(173, '173', 'A number of color style controls are available in CorelDRAW____ the Object style container and the Color styles container.', 'Coreldraw', '2026-01-16 08:36:48'),
(174, '174', 'Which of the following is are the text object type(s)?', 'Coreldraw', '2026-01-16 08:36:48'),
(175, '175', 'An object\'s attributes and properties are not modified by ____but by how an area of it is represented.', 'Coreldraw', '2026-01-16 08:36:48'),
(176, '176', 'Which of the file format  can be exported in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(177, '177', 'Which of the following techniques is \nare available in CorelDRAW to trace a bitmap?', 'Coreldraw', '2026-01-16 08:36:48'),
(178, '178', 'Which tool allows you to draw freehand lines and automatically smooth out the curves in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(179, '179', 'Which format is suitable for saving bitmap images with transparent backgrounds in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(180, '180', 'C aligns centers of selected objects vertically.', 'Coreldraw', '2026-01-16 08:36:48'),
(181, '181', 'What number of paper orientation do we have in Corel Draw?', 'Coreldraw', '2026-01-16 08:36:48'),
(182, '182', 'Corel Draw was Wrriten in _______', 'Coreldraw', '2026-01-16 08:36:48'),
(183, '183', 'What is the Shortcut key to fountain fills For the object  ?', 'Coreldraw', '2026-01-16 08:36:48'),
(184, '184', 'Which of the following submenu Convert the .CDR file for .JPG format ?', 'Coreldraw', '2026-01-16 08:36:48'),
(185, '185', 'What is Default Paper size in corel Drow ?', 'Coreldraw', '2026-01-16 08:36:48'),
(186, '186', 'The object is closed and can be known by?', 'Coreldraw', '2026-01-16 08:36:48'),
(187, '187', 'Which of the following Tool is used for editing Nodes or curve object?', 'Coreldraw', '2026-01-16 08:36:48'),
(188, '188', '______is used for selecting and deselecting objects.', 'Coreldraw', '2026-01-16 08:36:48'),
(189, '189', 'Can we increase sides of polygon by pressing up arrow key in CorelDraw?', 'Coreldraw', '2026-01-16 08:36:48'),
(190, '190', 'Which Tool in not a basic drawing tool in a 2d Image program ?', 'Coreldraw', '2026-01-16 08:36:48'),
(191, '191', 'Crop Tool helps in.', 'Coreldraw', '2026-01-16 08:36:48'),
(192, '192', 'CorelDraw is a ____________ based drawing Application Package.', 'Coreldraw', '2026-01-16 08:36:48'),
(193, '193', 'Bitmap images are made up of ____________.', 'Coreldraw', '2026-01-16 08:36:48'),
(194, '194', 'The ruler bar is used for _____________', 'Coreldraw', '2026-01-16 08:36:48'),
(195, '195', 'Corel Run Command?', 'Coreldraw', '2026-01-16 08:36:48'),
(196, '196', 'None of Corel Tool ?', 'Coreldraw', '2026-01-16 08:36:48'),
(197, '197', 'What is the Shortcut Key for Exit in CorelDraw ?', 'Coreldraw', '2026-01-16 08:36:48'),
(198, '198', 'Artistic Media Shortcut ?', 'Coreldraw', '2026-01-16 08:36:48'),
(199, '199', 'What is the Use of the Redo Tool in CorelDraw ?', 'Coreldraw', '2026-01-16 08:36:48'),
(200, '200', 'F3 the shortcut key to zoom in on all objects in the drawing.', 'Coreldraw', '2026-01-16 08:36:48'),
(201, '201', 'Which shortcut key to use text Modify .', 'Coreldraw', '2026-01-16 08:36:48'),
(202, '202', 'what is Not a color Model used on 2D and 3D Images ?', 'Coreldraw', '2026-01-16 08:36:48'),
(203, '203', 'How do You create a Perfect Circle in Corel DRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(204, '204', 'Which Coreldraw Tool lets you place an object inside another object\'s Shape ?', 'Coreldraw', '2026-01-16 08:36:48'),
(205, '205', 'In CorelDRAW which shortcut key is used to group selected objects?', 'Coreldraw', '2026-01-16 08:36:48'),
(206, '206', 'Which menu is used to align objects in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(207, '207', 'What does pressing F2 do in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(208, '208', 'Which of the following options lets you place an object in front of or behind other objects?', 'Coreldraw', '2026-01-16 08:36:48'),
(209, '209', 'What is the use of the Convert to Curves (Ctrl + Q) command?', 'Coreldraw', '2026-01-16 08:36:48'),
(210, '210', 'Which menu contains Zoom options?', 'Coreldraw', '2026-01-16 08:36:48'),
(211, '211', 'Which command is used to break apart combined objects?', 'Coreldraw', '2026-01-16 08:36:48'),
(212, '212', 'Which tool is used to apply a gradient (fountain) fill in an object?', 'Coreldraw', '2026-01-16 08:36:48'),
(213, '213', 'What is the shortcut key to open the Color Palette in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(214, '214', 'Which color models are commonly used in CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(215, '215', 'The default color palettes in CorelDRAW is placed:', 'Coreldraw', '2026-01-16 08:36:48'),
(216, '216', 'Which of the following is used to apply no fill color to an object?', 'Coreldraw', '2026-01-16 08:36:48'),
(217, '217', 'What is the default file extension of a CorelDRAW file?', 'Coreldraw', '2026-01-16 08:36:48'),
(218, '218', 'Which of the following file formats cannot be imported into CorelDRAW?', 'Coreldraw', '2026-01-16 08:36:48'),
(219, '219', 'Which command is used to set the orientation of the page in CorelDRAW ?', 'Coreldraw', '2026-01-16 08:36:48'),
(220, '220', 'You can create multiple pages in CorelDRAW from which menu?', 'Coreldraw', '2026-01-16 08:36:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
