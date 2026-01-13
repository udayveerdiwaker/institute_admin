-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2025 at 11:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_exams`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_number` varchar(10) NOT NULL,
  `question_text` varchar(200) NOT NULL,
  `sub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_number`, `question_text`, `sub`) VALUES
(1, '1', 'Microsoft word is ____ software.?', 'Computer'),
(2, '2', 'Which is not in MS Word?', 'Computer'),
(3, '3', 'Which is not an edition of MS Word?', 'Computer'),
(4, '4', 'What is the blank space outside the printing area on a page?', 'Computer'),
(5, '5', 'The ability to combine name and addresses with a standard document is called ________', 'Computer'),
(6, '6', 'The valid format of MS Word is ___?.', 'Computer'),
(7, '7', '_____ is the change the way text warps around the selected object.', 'Computer'),
(8, '8', 'In the _____ we can change the view of the document and set the zoom option.', 'Computer'),
(9, '9', 'What is thw default font of a Microsoft word 2007 Document.', 'Computer'),
(10, '10', 'Which Option is not available in the page setup group of page layout tab ', 'Computer'),
(11, '11', 'Which of the following language does the computer understand?', 'Computer'),
(12, '12', 'Which of the following unit is responsible for converting the data received from the user into a computer understandable format?', 'Computer'),
(13, '13', 'Which of the following is the correct abbreviation of COMPUTER?', 'Computer'),
(14, '14', 'What menu is selected to print ?', 'Computer'),
(15, '15', 'Which of the following are physical devices of a computer?', 'Computer'),
(16, '16', 'Who is the father of Computers?', 'Computer'),
(17, '17', 'It is done by CTRL+E .', 'Computer'),
(18, '18', 'It is done by CTRL+F .', 'Computer'),
(19, '19', 'Which of the following is a shortcut key for \"spelling and Grammar ?  ', 'Computer'),
(20, '20', 'Two Kinds of Main Memory are ?', 'Computer'),
(21, '21', 'What is MS Excel?', 'Computer'),
(22, '22', 'What is the row limit of MS Excel 2019? ', 'Computer'),
(23, '23', 'In Microsoft Excel spreadsheets, rows are designated as _______?', 'Computer'),
(24, '24', 'The Greater Than sign (>) exemplifies a/an _____ operator.', 'Computer'),
(25, '25', '____ is the correct syntax of IF() Function. ', 'Computer'),
(26, '26', 'Why is the =COUNTIF function in Excel used? ', 'Computer'),
(27, '27', 'What do Excel formulas start with? ', 'Computer'),
(28, '28', 'How to Open the Insert hyperlink dialog box? ', 'Computer'),
(29, '29', 'What is shortcut key to open an existing workbook?', 'Computer'),
(30, '30', 'What is Excel used for?', 'Computer'),
(31, '31', 'What is the Max Zoom percentage in MS PowerPoint?', 'Computer'),
(32, '32', 'In the current presentation, if we want to insert a new slide, we can choose which of these?', 'Computer'),
(33, '33', 'Which of the following fill effects can be used to fill the background of the slide?', 'Computer'),
(34, '34', 'Slides Are prepared in ?', 'Computer'),
(35, '35', 'In power point, Themes could befound Under- ', 'Computer'),
(36, '36', 'In Ms powerpoint ,key used to run the slide show from the beginning is -', 'Computer'),
(37, '37', 'Which type of view is not present in MS-PowerPoint? ', 'Computer'),
(38, '38', 'Which of the Following Sortcut keys is used to end a Powerpoint Persentation? ', 'Computer'),
(39, '39', 'What do we use if we want to add texts in a given slide?', 'Computer'),
(40, '40', 'From which of these menus can we access a Text Box, Picture, Chart etc.?', 'Computer'),
(41, '41', 'which of the following shortcut key to open new Blank Document in ms word ? ', 'Computer'),
(42, '42', 'In how many generation a computer can be classified ?', 'Computer'),
(43, '43', 'Fifth genration computer are based on ? ', 'Computer'),
(44, '44', 'Which one of the Following is an example of oprating system ? ', 'Computer'),
(45, '45', 'Which of the following is the powerful type of the computer ?', 'Computer'),
(46, '46', 'Which one is not an input device?', 'Computer'),
(47, '47', '____ is not a function in Excel.', 'Computer'),
(48, '48', 'What we have to type in the Run dialog box to open Powerpoint?', 'Computer'),
(49, '49', 'In PowerPoint, is it allowed to make a PDF of the powerpoint presentation?', 'Computer'),
(50, '50', 'What does CPU stand for?', 'Computer'),
(51, '51', 'Who invented c programming language?', 'C'),
(52, '52', 'Which of the following is not a valid C variable name?', 'C'),
(53, '53', 'All keywords in C are in ____________', 'C'),
(54, '54', 'What is the 16-bit compiler allowable range for integer constants?', 'C'),
(55, '55', '#include <stdio.h>\nstruct School {\n    int age, rollNo;\n};\nvoid solve() {\n    struct School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    printf(\"%d %d\", sc.age, sc.rollNo);\n}\nint main() {\n    solve();', 'C'),
(56, '56', '#include <stdio.h>\nvoid solve() {\n    int x = 2;\n    printf(\"%d\", (x << 1) + (x >> 1));\n}\nint main() {\n    solve();\n	return 0;\n}', 'C'),
(57, '57', '#include <stdio.h>\nvoid solve() {\n    int x = 1, y = 2;\n    printf(x > y ? \"Greater\" : x == y ? \"Equal\" : \"Lesser\");\n}\nint main() {\n    solve();\n	return 0;\n}', 'C'),
(58, '58', '#include <stdio.h>\nint main() {\n	int a = 3, b = 5;\n	int t = a;\n	a = b;\n	b = t;\n	printf(\"%d %d\", a, b);\n	return 0;\n}', 'C'),
(59, '59', 'Which of the following is not a logical operator?', 'C'),
(60, '60', 'Which of the following operators can be applied on structure variables?', 'C'),
(61, '61', 'What does the `sizeof` operator in C return?', 'C'),
(62, '62', 'In C, which function is used to close a file?', 'C'),
(63, '63', '#include <stdio.h>\nvoid solve() {\n    int ch = 2;\n    switch(ch) {\n        case 1: printf(\"1 \");\n        case 2: printf(\"2 \");\n        case 3: printf(\"3 \");\n        default: printf(\"None\");\n    }\n}\nin', 'C'),
(64, '64', '#include <stdio.h>\nvoid solve() {\n    int x = printf(\"Hello\");\n    printf(\" %d\", x);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C'),
(65, '65', 'int main() {\n	int sum = 2 + 4 / 2 + 6 * 2;\n	printf(\"%d\", sum);\n	return 0;\n}', 'C'),
(66, '66', '#include <stdio.h>\nunion School {\n    int age, rollNo;\n    double marks;\n};\nvoid solve() {\n    union School sc;\n    sc.age = 19;\n    sc.rollNo = 82;\n    sc.marks = 19.04;\n    printf(\"%d\", (int)sizeof(', 'C'),
(67, '67', ' Which of the following is not true about structs in C?', 'C'),
(68, '68', ' What is an example of iteration in C?', 'C'),
(69, '69', 'What is #include <stdio.h>?', 'C'),
(70, '70', 'What is the sizeof(char) in a 32-bit C compiler?', 'C'),
(71, '71', '#include <stdio.h>\nint main() {\n	int a[] = {1, 2, 3, 4};\n	int sum = 0;\n	for(int i = 0; i < 4; i++) {\n	    sum += a[i];\n	}\n	printf(\"%d\", sum);\n	return 0;\n}', 'C'),
(72, '72', '#include <stdio.h>\nint main() {\n	 char str[] = \"Hello, World!\";\n\n    printf(\"%s\", str + 7);\n\n    return 0;\n}\n', 'C'),
(73, '73', '#include <stdio.h>\nint main() {\n	  int x = 5;\n\n    int y = (x++) + (++x);\n\n    printf(\"%d\", y);\n\n    return 0;\n}', 'C'),
(74, '74', '#include <stdio.h>\nint main() {\n	   int a = 10, b = 20, c;\n\n    c = a > b ? a : b;\n\n    printf(\"%d\", c);\n\n    return 0;\n}', 'C'),
(75, '75', 'What is the purpose of the `union` data type in C?', 'C'),
(76, '76', 'Which of the following standard C library functions is used for memory allocation and deallocation?', 'C'),
(77, '77', 'which operator is used to access the address of a variable?', 'C'),
(78, '78', 'What is the purpose of the `do?while` loop in C?', 'C'),
(79, '79', '#include <stdio.h>\nvoid solve() {\n    printf(\"%d %d\", (023), (23));\n}\nint main() {\n    solve();\n	return 0;\n}\n', 'C'),
(80, '80', '#include <stdio.h>\nvoid solve() {\n    int a = 3;\n    int res = a++ + ++a + a++ + ++a;\n    printf(\"%d\", res);\n}\nint main() {\n	solve();\n	return 0;\n}', 'C'),
(81, '81', '#include <stdio.h>\n#include<string.h>\nvoid solve() {\n    char s[] = \"Hello\";\n    printf(\"%s \", s);\n    char t[40];\n    strcpy(t, s);\n    printf(\"%s\", t);\n}\nint main() {\n    solve();\n	return 0;\n}', 'C'),
(82, '82', '#include <stdio.h>\nvoid solve(int x) {\n    if(x == 0) {\n        printf(\"%d \", x);\n        return;\n    }\n    printf(\"%d \", x);\n    solve(x - 1);\n    printf(\"%d \", x);\n}\nint main() {\n    solve(3);\n	retu', 'C'),
(83, '83', 'What is the purpose of the strcat function in C?', 'C'),
(84, '84', ' which operator is used for bitwise OR?', 'C'),
(85, '85', 'What is the purpose of the `static` keyword when applied to a local variable in C?', 'C'),
(86, '86', ' Which of the following data types in C has the highest storage size?', 'C'),
(87, '87', '#include <stdio.h>\nint main()\n{\nint i = 0;\ndo\n{\ni++;\nif(i == 2)\ncontinue;\nprintf(\"In while loop \");\n}\nwhile (i < 2);\nprintf(\"%d\\n\", i);\n}', 'C'),
(88, '88', '#include <stdio.h>\nint main()\n{\nint i = 0;\nwhile (i < 3)\ni++;\nprintf(\"In while loop\\n\");\n}', 'C'),
(89, '89', '#include <stdio.h>\nvoid main()\n{\nint x = 5 * 9 / 3 + 9;\nprintf(\"%d\\n\", x);\n}', 'C'),
(90, '90', '#include <stdio.h>\nint main()\n{\nint main = 3;\nprintf(\"%d\", main);\nreturn 0;\n}', 'C'),
(91, '91', 'Which of these won?t return any value?', 'C'),
(92, '92', 'Which of these keywords do we use for the declaration of the friend function?', 'C'),
(93, '93', 'What does polymorphism stand for?', 'C'),
(94, '94', 'Which container is the best for keeping a collection of various distinct elements?', 'C'),
(95, '95', '#include <iostream>\n\nint main()\n{\n if(0)\n {\n    std::cout<<\"Hi\";\n }\n else\n {\n    std::cout<<\"Bye\";\n }\nreturn 0;\n}', 'C'),
(96, '96', '#include<iostream>\n\nint main()\n{\nint a=10; \nstd::cout<<a++;\nreturn 0;\n}', 'C'),
(97, '97', '#include<iostream>\n\nint main()\n{\n    int i=0;\n    lbl:\n    std::cout<<\"CppBuzz.com\";\n    i++;\n    if(i<5)\n    {\n	goto lbl;\n    }\n\n    return 0;\n\n}', 'C'),
(98, '98', '#include <iostream>\nusing namespace std;\n\nint main()\n{\nint a = 10;\ncout<<a++;\nreturn 0;\n}', 'C'),
(99, '99', 'Can a for loop contain another for loop?', 'C'),
(100, '100', 'Which operator can not be overloaded in C++?', 'C'),
(101, '101', 'Which operator has highest precedence in below list in C++?', 'C'),
(102, '102', 'What is correct syntax of a for loop in C++?', 'C'),
(103, '103', 'int main()\n{\n  int a=10;\n  int b,c;\n  b = a++;\n  c = a;\n  std::cout<<a<<b<<c;\n  return 0;\n}', 'C'),
(104, '104', '#include<iostream>\nint main()\n{\n    int a = 1;\n    switch(a)\n    {\n    case 1: std::cout<<\"One\";\n    case 2: std::cout<<\"Two\";\n    case 3: std::cout<<\"Three\";\n    default: std::cout<<\"Default\";\n    }\n', 'C'),
(105, '105', '#include<iostream>\n\nint main()\n{\n\nstd::cout<<-1-1-1;\n\nreturn 0;\n}', 'C'),
(106, '106', '#include <iostream>\nusing namespace std;\n\nint main() \n{\nint x = 5;\n\nif(x++ == 5)\ncout<<\"Five\"<<endl;\nelse\nif(++x == 6)\ncout<<\"Six\"<<endl;\n\nreturn 0;\n}', 'C'),
(107, '107', 'What is abstract class?', 'C'),
(108, '108', 'Can a Structure contain pointer to itself?', 'C'),
(109, '109', 'In OOP, what does encapsulation refer to?', 'C'),
(110, '110', 'Which concept in OOP allows for the same function to be used in different ways based on the object it is associated with?', 'C'),
(111, '111', '#include<iostream>\nenum color\n{\n	black=1,\n	blue,\n	red	\n};\nint main()\n{\n    color obj = blue;\n    std::cout<<obj;\n	return 0;\n}', 'C'),
(112, '112', '#include<iostream>\nusing namespace std;\nenum color{\n	black,\n	blue,\n	red	\n};\nint main()\n{    \n    color obj;\n    cout<<sizeof(obj);\n    return 0;\n}  ', 'C'),
(113, '113', '#include<iostream>\nusing namespace std;\n\nint main()\n{\n int x = 9;\n while (x>0)\n x--;\n cout<<x;\n\nreturn 0;\n}', 'C'),
(114, '114', '#include <iostream>\nusing namespace std;\nclass TestingClass\n{\npublic:\nTestingClass(int x)\n{\n cout << x << endl; \n}\n\nTestingClass()\n{\n cout <<\"Hello!\"<< endl; \n}\n\n};\nint main()\n{\n TestingClass test(77)', 'C'),
(115, '115', 'Which is the correct command used to compile source code (.cpp files) into object code(.o files)?', 'C'),
(116, '116', 'Which member function of a class is called automatically when any object is created of that class?', 'C'),
(117, '117', 'What type of function is not a member of a class, but has access to the private members of the class.', 'C'),
(118, '118', 'Which of following allows us to create new classes based on existing classes.', 'C'),
(119, '119', '#include<iostream>\n#include<string.h>\nusing namespace std;\n\nint main()\n{\n    char one[]=\"one\";\n    char two[]=\"two\";\n    \n    if(one==two){\n        cout<<\"Equal\";\n    }\n    \n    if(strcmp(one, two)==0', 'C'),
(120, '120', '#include <iostream>\n\nusing namespace std;\n\nint main()\n\n {\n\n    int arr[5] = {1, 2, 3, 4, 5};\n\n    int *ptr = arr;\n\n    cout << *(ptr + 2) << endl;\n\n    return 0;\n\n}', 'C'),
(121, '121', '  How Many Groups Are Pre -Defined in Tally ?', 'Tally'),
(122, '122', ' Tally package is developed by ?', 'Tally'),
(123, '123', ' In General the Financial Year From shall be from?', 'Tally'),
(124, '124', ' Which option is used in Tally to make changes in created company ?', 'Tally'),
(125, '125', ' Which menu is used to create new ledger , group  and voucher types in Tally?', 'Tally'),
(126, '126', '  which Submenu is used for voucher entry in tally ?', 'Tally'),
(127, '127', '  Salary Account Comes Under Which Head ?', 'Tally'),
(128, '128', 'Tally is an example of which type of software?', 'Tally'),
(129, '129', '  Which ledger is created by Tally Automatically as soon as we create a new company ?', 'Tally'),
(130, '130', '  20,000 withdrawn from State Bank . In Which Voucher type this transation will be recorded ?', 'Tally'),
(131, '131', '  Where do we record transactions of salary, rent or interest paid ?', 'Tally'),
(132, '132', ' Where do we record credit purchase of furniture in tally?', 'Tally'),
(133, '133', ' Which of the following equation is true for balance sheet ?', 'Tally'),
(134, '134', ' How Many Options Related to company features are there in \"F11: Freatures\" in tally ', 'Tally'),
(135, '135', ' Which option is used to view trial balance from gateway of Tally ?', 'Tally'),
(136, '136', ' What does ?F11? key stand for in Tally?', 'Tally'),
(137, '137', 'Default \'Godown\' name in tally is?', 'Tally'),
(138, '138', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally'),
(139, '139', ' Which menu in Tally allows you to view reports such as balance sheets and profit & loss statements?', 'Tally'),
(140, '140', ' What is the full form of ERP in Tally ERP 9?', 'Tally'),
(141, '141', ' In Tally, what is the use of \"Alt + C\"?', 'Tally'),
(142, '142', ' In Tally, where do you configure payroll features?', 'Tally'),
(143, '143', ' Which of the following ledgers cannot be deleted in Tally?', 'Tally'),
(144, '144', ' In Tally, which type of ledger is \"Sundry Debtors\"?', 'Tally'),
(145, '145', ' If a company purchases goods worth ?10,000 on credit, what would the journal entry be?', 'Tally'),
(146, '146', ' In Tally, what is the correct journal entry to record the purchase of furniture on credit?', 'Tally'),
(147, '147', ' Which voucher is used to record the return of goods to a supplier in Tally?', 'Tally'),
(148, '148', ' Which shortcut key is used to record a Credit Note Voucher in Tally?', 'Tally'),
(149, '149', ' Which of the following is not recorded in a Contra Voucher?', 'Tally'),
(150, '150', ' Which of the following is NOT a component of Tally?', 'Tally'),
(151, '151', ' In Tally, what does the \"F12: Configure\" option do?', 'Tally'),
(152, '152', ' Which shortcut key is used to change the date in Tally?', 'Tally'),
(153, '153', ' Which voucher is used to record personal drawings (owner withdrawing money for personal use) from the business?', 'Tally'),
(154, '154', ' Which Option is user to view to stock Group and Stock Summery ', 'Tally'),
(155, '155', ' We can Modify an exsiting company from ?', 'Tally'),
(156, '156', ' In Tally, which of the following is considered a real account?', 'Tally'),
(157, '157', ' In Tally, which ledger is created under the group \"Current Liabilities\"?', 'Tally'),
(158, '158', ' Which of the following is not a feature of Tally ?', 'Tally'),
(159, '159', ' Which of the following keys is used to Delete in ledger ?', 'Tally'),
(160, '160', 'Which of the following is the Predefined  stock category in Tally?', 'Tally'),
(161, '161', ' Which of the following can be managed using Tally?', 'Tally'),
(162, '162', 'What  shortcut key is journal Vaucher ?', 'Tally'),
(163, '163', ' What is the primary file extension used for Tally data files ?', 'Tally'),
(164, '164', 'The Short key of company creation ?', 'Tally'),
(165, '165', ' Which feature in Tally allows you to define custom invoice formats?', 'Tally'),
(166, '166', ' Which characteristic of Tally allows it to be user-friendly ?', 'Tally'),
(167, '167', ' What does Tally?s \'User Management\' feature allow ?', 'Tally'),
(168, '168', ' We can get the report of Interest From ?', 'Tally'),
(169, '169', ' Single entry mode Applicable for ?', 'Tally'),
(170, '170', ' Goods Returning to a Creditor after challan but before bill we need to pass?', 'Tally'),
(171, '171', ' What is Corel draw ?', 'Coreldraw'),
(172, '172', 'Which of the following is are the advantage(s) of Coreldraw Graphics?', 'Coreldraw'),
(173, '173', 'A number of color style controls are available in CorelDRAW____ the Object style container and the Color styles container.', 'Coreldraw'),
(174, '174', 'Which of the following is are the text object type(s)?', 'Coreldraw'),
(175, '175', 'An object\'s attributes and properties are not modified by ____but by how an area of it is represented.', 'Coreldraw'),
(176, '176', 'Which of the file format  can be exported in CorelDRAW?', 'Coreldraw'),
(177, '177', 'Which of the following techniques is \nare available in CorelDRAW to trace a bitmap?', 'Coreldraw'),
(178, '178', 'Which tool allows you to draw freehand lines and automatically smooth out the curves in CorelDRAW?', 'Coreldraw'),
(179, '179', 'Which format is suitable for saving bitmap images with transparent backgrounds in CorelDRAW?', 'Coreldraw'),
(180, '180', 'C aligns centers of selected objects vertically.', 'Coreldraw'),
(181, '181', 'What number of paper orientation do we have in Corel Draw?', 'Coreldraw'),
(182, '182', 'Corel Draw was Wrriten in _______', 'Coreldraw'),
(183, '183', 'What is the Shortcut key to fountain fills For the object  ?', 'Coreldraw'),
(184, '184', 'Which of the following submenu Convert the .CDR file for .JPG format ?', 'Coreldraw'),
(185, '185', 'What is Default Paper size in corel Drow ?', 'Coreldraw'),
(186, '186', 'The object is closed and can be known by?', 'Coreldraw'),
(187, '187', 'Which of the following Tool is used for editing Nodes or curve object?', 'Coreldraw'),
(188, '188', '______is used for selecting and deselecting objects.', 'Coreldraw'),
(189, '189', 'Can we increase sides of polygon by pressing up arrow key in CorelDraw?', 'Coreldraw'),
(190, '190', 'Which Tool in not a basic drawing tool in a 2d Image program ?', 'Coreldraw'),
(191, '191', 'Crop Tool helps in.', 'Coreldraw'),
(192, '192', 'CorelDraw is a ____________ based drawing Application Package.', 'Coreldraw'),
(193, '193', 'Bitmap images are made up of ____________.', 'Coreldraw'),
(194, '194', 'The ruler bar is used for _____________', 'Coreldraw'),
(195, '195', 'Corel Run Command?', 'Coreldraw'),
(196, '196', 'None of Corel Tool ?', 'Coreldraw'),
(197, '197', 'What is the Shortcut Key for Exit in CorelDraw ?', 'Coreldraw'),
(198, '198', 'Artistic Media Shortcut ?', 'Coreldraw'),
(199, '199', 'What is the Use of the Redo Tool in CorelDraw ?', 'Coreldraw'),
(200, '200', 'F3 the shortcut key to zoom in on all objects in the drawing.', 'Coreldraw'),
(201, '201', 'Which shortcut key to use text Modify .', 'Coreldraw'),
(202, '202', 'what is Not a color Model used on 2D and 3D Images ?', 'Coreldraw'),
(203, '203', 'How do You create a Perfect Circle in Corel DRAW?', 'Coreldraw'),
(204, '204', 'Which Coreldraw Tool lets you place an object inside another object\'s Shape ?', 'Coreldraw'),
(205, '205', 'In CorelDRAW which shortcut key is used to group selected objects?', 'Coreldraw'),
(206, '206', 'Which menu is used to align objects in CorelDRAW?', 'Coreldraw'),
(207, '207', 'What does pressing F2 do in CorelDRAW?', 'Coreldraw'),
(208, '208', 'Which of the following options lets you place an object in front of or behind other objects?', 'Coreldraw'),
(209, '209', 'What is the use of the Convert to Curves (Ctrl + Q) command?', 'Coreldraw'),
(210, '210', 'Which menu contains Zoom options?', 'Coreldraw'),
(211, '211', 'Which command is used to break apart combined objects?', 'Coreldraw'),
(212, '212', 'Which tool is used to apply a gradient (fountain) fill in an object?', 'Coreldraw'),
(213, '213', 'What is the shortcut key to open the Color Palette in CorelDRAW?', 'Coreldraw'),
(214, '214', 'Which color models are commonly used in CorelDRAW?', 'Coreldraw'),
(215, '215', 'The default color palettes in CorelDRAW is placed:', 'Coreldraw'),
(216, '216', 'Which of the following is used to apply no fill color to an object?', 'Coreldraw'),
(217, '217', 'What is the default file extension of a CorelDRAW file?', 'Coreldraw'),
(218, '218', 'Which of the following file formats cannot be imported into CorelDRAW?', 'Coreldraw'),
(219, '219', 'Which command is used to set the orientation of the page in CorelDRAW ?', 'Coreldraw'),
(220, '220', 'You can create multiple pages in CorelDRAW from which menu?', 'Coreldraw');

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
