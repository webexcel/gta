-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 08:09 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gta`
--

-- --------------------------------------------------------

--
-- Table structure for table `img_lib`
--

CREATE TABLE `img_lib` (
  `id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `img_lib`
--

INSERT INTO `img_lib` (`id`, `img_name`, `img_path`, `status`) VALUES
(1, '3d1', '3D FIGQ1.jpg', 0),
(2, 'Circle_Q1', 'Circle_Q1.jpg', 0),
(3, 'Circle_Q4', 'Circle_Q4.jpg', 0),
(4, 'Circle_Q10', 'Circle_Q10.jpg', 0),
(5, 'Circle_Q12', 'Circle_Q12.jpg', 0),
(6, 'Circle_Q14', 'Circle_Q14.jpg', 0),
(7, 'Circle_Q15', 'Circle_Q15.jpg', 0),
(8, 'Circle_Q17', 'Circle_Q17.jpg', 0),
(9, 'Circle_Q21', 'Circle_Q21.jpg', 0),
(10, 'Circle_Q22', 'Circle_Q22.jpg', 0),
(11, 'Circle_Q26', 'Circle_Q26.jpg', 0),
(14, 'Circle_Q27', 'Circle_Q27.jpg', 0),
(15, 'Circle_Q28', 'Circle_Q28.jpg', 0),
(16, 'Circle_Q30', 'Circle_Q30.jpg', 0),
(17, 'TRI_A7', 'TRI_A7.jpg', 0),
(18, 'TRI_A10', 'TRI_A10.jpg', 0),
(19, 'TRI_A20', 'TRI_A20.jpg', 0),
(20, 'TRI_A24a', 'TRI_A24a.jpg', 0),
(21, 'TRI_A32', 'TRI_A32.jpg', 0),
(22, 'TRI_A34', 'TRI_A34.jpg', 0),
(23, 'TRI-A7', 'TRI-A7.jpg', 0),
(24, 'TRI-A10', 'TRI-A10.jpg', 0),
(25, 'TRI-A24a', 'TRI-A24a.jpg', 0),
(26, 'TRI_Q1', 'TRI_Q1.jpg', 0),
(27, 'TRI_Q2', 'TRI_Q2.jpg', 0),
(28, 'TRI_Q3', 'TRI_Q3.jpg', 0),
(29, 'TRI_Q4', 'TRI_Q4.jpg', 0),
(31, 'TRI_Q5', 'TRI_Q5.jpg', 0),
(32, 'TRI_Q6', 'TRI_Q6.jpg', 0),
(33, 'TRI_Q8', 'TRI_Q8.jpg', 0),
(34, 'TRI_Q13', 'TRI_Q13.jpg', 0),
(35, 'TRI_Q14', 'TRI_Q14.jpg', 0),
(36, 'TRI_Q15', 'TRI_Q15.jpg', 0),
(37, 'TRI_Q16', 'TRI_Q16.jpg', 0),
(38, 'TRI_Q17', 'TRI_Q17.jpg', 0),
(39, 'TRI_Q18', 'TRI_Q18.jpg', 0),
(40, 'TRI_Q19', 'TRI_Q19.jpg', 0),
(41, 'TRI_Q124', 'TRI_Q24.jpg', 0),
(42, 'TRI_Q25', 'TRI_Q25.jpg', 0),
(43, 'TRI_Q28', 'TRI_Q28.jpg', 0),
(44, 'TRI_Q31', 'TRI_Q31.jpg', 0),
(45, 'TRI_Q33', 'TRI_Q33.jpg', 0),
(46, 'TRI_Q35', 'TRI_Q35.jpg', 0),
(47, 'TRI_Q36', 'TRI_Q36.jpg', 0),
(48, 'TRI_Q37', 'TRI_Q37.jpg', 0),
(49, 'TRI_Q40', 'TRI_Q40.jpg', 0),
(50, 'TRI_Q41', 'TRI_Q41.jpg', 0),
(51, 'TRI_Q42', 'TRI_Q42.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE `questionbank` (
  `id` int(11) NOT NULL,
  `question_papper_id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8 NOT NULL,
  `que_image` varchar(101) NOT NULL,
  `level` varchar(11) NOT NULL,
  `topic` varchar(250) NOT NULL,
  `options` varchar(500) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(50) CHARACTER SET utf8 NOT NULL,
  `explanation` text CHARACTER SET utf8 NOT NULL,
  `ans_image` varchar(101) NOT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`id`, `question_papper_id`, `question`, `que_image`, `level`, `topic`, `options`, `answer`, `explanation`, `ans_image`, `insDate`, `status`) VALUES
(1, 1, 'Quantity A : the area of the shaded region\nQuantity B : π\n\n', 'Circle_Q1.jpg', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'C', 'The side length of the square is the radius of the circle, so the area of the circle is πr2 = 4π. Central angle CDA measures 90 degrees because ABCD is a square. 90 degrees represents 90/360=1/4   of the circle, so the area of the shaded region will be of the area of the circle, π. The quantities are equal. ', '', '2023-02-26 13:11:01', 1),
(2, 1, 'What is the degree measure of the smaller angle formed by the hands of a circular clock when it is 10:00? _____\n\n', '', 'Medium', 'Circle', '', '60', 'The clock is a circle of 360 degrees, and the 12 numbers create 12 equal intervals around the clock. Therefore, each interval between two consecutive numbers must equal 30 degrees. At 10:00, the two hands are two numbers apart, and create an angle of 60 degrees', '', '2023-02-26 13:11:11', 1),
(3, 1, 'The area of circle C is 9π.\nQuantity A : The radius of circle C\nQuantity B :\n\n\n', '', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'B', 'The formula for the area of a circle is πr2, where r is the radius of the circle. If you set this formula equal to the area of circle C, you get πr2 = 9π. Dividing by π on both sides of the equation yields r2 = 9, and taking the square root of both sides results in r = 3. The radius of circle C is 3, giving you choice (B) for the answer. ', '', '2023-02-26 13:11:11', 1),
(4, 1, 'Line segments UV, WX, and YZ are diameters of the circles with centers A, B, and C, respectively. If YZ = 2, then what is the area of Line segments UV, WX, and YZ are diameters of the circles with centers A, B, and C, respectively. If YZ = 2, then what is the area of the circle with center A?\n\n\n', 'Circle_Q2.jpg', 'Medium', 'Circle', '4π, 8π,9π,16π,64π', 'D', 'All diameters in a circle are of equal length. Draw a horizontal diameter in the smallest circle; it must be 2 units long. This diameter is also the radius of the circle with center B, whose diameter must therefore be 4 units long. Draw this diameter horizontally, and you realize that it is also the radius of the circle with center A, whose area is πr2 = 16π. ', '', '2023-02-26 13:11:11', 1),
(5, 1, 'Quantity A : The circumference of a circle with a diameter of 6\nQuantity B : The circumference of a circle with a radius of 12\n\n', '', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater., The two quantities are equal.,The relationship cannot be determined from the information given.', 'B', 'The circumference of a circle with a diameter of 6 is πd = 6π. The circumference of a circle with a radius of 12 is 2πr = 24π, so choice (B) is larger.', '', '2023-02-26 13:11:11', 1),
(6, 1, 'Quantity A : Four times the area of a circular region with a circumference of 4π\nQuantity B :  The circumference of a circular region with an area of 64π\n', '', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'C', 'For this problem, use the circle formulas—Area = πr2 and Circumference = 2πr—and do the problem one step at a time. For Quantity A, a circle with a circumference of 4π yields 4π = 2πr, so 2r = 4, and r = 2; thus, the area of the circle is 22π, or 4π, and 4 times that is 16π. For Quantity B, a circle with an area of 64π yields 64π = πr2, so r2 = 64, and r = 8; thus, the circumference of the circle is 2(8)π, or 16π. The quantities are equal. ', '', '2023-02-26 13:11:11', 1),
(7, 1, ' An office needs to buy circular pizzas for 20 employees. If each pizza is cut into equal slices, and each slice has a central angle of 40°, what is the minimum number of pizzas that need to be ordered so that each employee gets at least two slices of pizza?', '', 'Medium', 'Circle', '', '5', 'First, determine the number of slices that will satisfy the question: There are 20 employees that need at least two slices each, so you need a total of at least 40 slices. Next, determine how many slices each pizza has: Each slice has a central angle of 40˚ out of 360˚, so each pizza has (360/40)= 9 slices. Since 4 pizzas would only provide 36 slices, you need one more pizza, so 5 is the correct response.', '', '2023-02-26 13:11:11', 1),
(8, 1, 'Triangle ABC is equilateral. If the circle with center A has a diameter of 6, what is the length of the darkened arc?\n\n\n', '', 'Medium', 'Circle', 'π/2, π,6,6 π,6√3', 'B', 'Each angle in an equilateral triangle measures 60°. The degree measure of the darkened arc is therefore 60°, which represents (1/6) of the 360° in the circle. Thus, the length of the darkened arc will be of the circumference of the circle. If the diameter is 6, the radius is 3, so the circumference is 2πr = 6π. 1/6 of 6π is π. ', '', '2023-02-26 13:11:11', 1),
(9, 1, 'A circle with center C has a radius of 6.\nQuantity A : The ratio of the circumference of C to the radius of C\nQuantity B : Half the diameter of C\n\n', '', 'Easy', 'Circle', 'Quantity A is greater.,Quantity B is greater.,. The two quantities are equal.,The relationship cannot be determined from the information given.', 'A', 'For Quantity A, the circumference of C is 2πr = 2π(6) = 12π; the radius is 6. So, the ratio is 12π/6= 2π. For Quantity B, half the diameter is the same as the radius, 6. Ballpark that 2π is a little more than 6, making Quantity A greater.', '', '2023-02-26 13:11:11', 1),
(10, 1, 'O is the center of the circle above.\nQuantity A : Length of line segment AB\nQuantity B : Length of line segment CD\na. \nb. \nc. \nd. \n', 'Circle_Q10.jpg', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'A', 'Notice that chord AB goes through the center of the circle. Thus, AB is a diameter; a diameter is the longest chord in a circle. Chord CD does not go through the center of the circle, so AB must be longer than CD. ', '', '2023-02-26 13:11:11', 1),
(11, 1, 'A circle of radius 3 is inscribed in a square. What is the product of the perimeter and area of the square?\n\n', '', 'Medium', 'Circle', '', '864', 'Draw the diagram of the circle in the square, and draw the radii of length 3 from the center straight up and down. This allows you to see that the side of the square is equal to the diameter of the circle and equals 6. The perimeter of the square equals the sum of all the sides, or 24, and the area of the square equals the side squared, or 36. Use your on-screen calculator to find that the product of the perimeter and the area of the square is 864.', '', '2023-02-26 13:11:11', 1),
(12, 1, 'In the figure above, a rectangle is inscribed in a circle. Lengths x and y are both integers such that x + y = 10, and 1 < x < y. Which of the following are possible values for the diameter of the circle? Indicate all possible values.\n\n\n', 'Circle_Q12.jpg', 'Hard', 'Circle', '√10,√2,2√13,√58,√69,2√17,10', 'C, D, F ', 'Consider all the possible different integer pairs for the dimensions of the rectangle. You cannot try the integer pair of 1 and 9 or 5 and 5, because you know that x < y. If the rectangle has sides of 4 and 6, you can solve for the diagonal (equal to the circle’s diameter) with the Pythagorean theorem, which gives you √52 or 2√13, correct choice (C). If the rectangle has sides of 3 and 7, the diagonal is√58, correct choice (D). If the rectangle has sides of 2 and 8, the diagonal is√68, or2√17 , correct choice (F). ', '', '2023-02-26 13:12:21', 1),
(13, 1, 'The height of a right circular cylinder is increased by p percent and the radius is decreased by p percent\nQuantity A : The volume of the cylinder if p = 10\nQuantity B : The volume of the cylinder if p = 20', '', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'A', 'Fill in 10 for the height and radius of the cylinder. So Quantity A is πr^2h = π9^211 = 891π. Quantity B is π8^212 = 768π.', '', '2023-02-26 13:11:11', 1),
(14, 1, 'The diameters of the semicircles above are 8, and the diameter of the semicircle on the right is perpendicular to those of the other two semicircles. What is the total area of the shaded region?', 'Circle_Q14.jpg', 'Hard', 'Circle', '12π + 64,24π + 12,24π + 48,32π + 48,32π + 64', 'C', 'Draw a fourth triangle and semicircle, and you can see that the figure shown represents 1 ½ circles and ¾ of a square. Because the three diameters are perpendicular and congruent, they represent three sides of a square; the isosceles right triangles shown constitute three of the four triangles in the completed square. The area of a circle with diameter of 8 (and radius of 4) is πr2 = 16π. 1 ½  Times this area is 24π. Eliminate choices (A), (D), and (E) because they do not contain 24π. The diameter of each semicircle is the length of the side of the square. The area of the entire square would be s2 = 82 = 64.(3/4) of this area is 48. Adding the two areas together gives you the expression in choice (C).\n\n', '', '2023-02-26 13:11:11', 1),
(15, 1, 'Triangle ACE is equilateral with side lengths of 8. Points B and D are the midpoints of line segments AC and CE respectively. Line segment BD is a diameter of the circle with center F. What is the area of the shaded region?\n\n\n', 'Circle_Q15.jpg', 'Hard', 'Circle', '8√2 - 4π,12√3 – 2 π,12√3 – 4 π,16√3 – 2 π,16√2 – 4 π', 'B', 'To find the shaded region, subtract the unshaded region (the triangle and semicircle) from the entire triangle. The area of an equilateral triangle of side x is (x2 √3)/4 = (82√3)/4 = 16√3 . Triangle BCD is also equilateral, and has sides of length 4, so its area is 4√3. The radius of the circle is 2, so the area of the semicircle is(1/2)πr2 = (1/2) π22 = 2 π. So the answer is 16√3 - 4√3 -2π. \n\n', '', '2023-02-26 13:11:11', 1),
(16, 1, ' Quantity A : The area of a square with a perimeter of p\nQuantity B : The area of a circle with a circumference of p\n\n', '', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'B', 'fill in a value for p. If p = 8, then the side of the square is 2 and the area is 4. If the circumference of the circle is 8, then the radius is4/π , and the area is 16/π —approximately 5. Quantity B is larger. fill in another value for p and you will find that Quantity B remains larger.', '', '2023-02-26 13:11:11', 1),
(17, 1, 'Line AB passes through the center of circle O and through the centers of each of the 3 identical smaller circles. Each circle touches two other circles at exactly one point each.\nQuantity A : The circumference of circle O\nQuantity B : The sum of the circumferences of the 3 smaller circles\n', 'Circle_Q17.jpg', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,. The two quantities are equal.,The relationship cannot be determined from the information given', 'C', 'Start by fillging in a radius for the smaller circles; try r = 2. The circumference of each circle is 2πr = 4π, and the sum of all three circumferences is 12π. Because the diameter of circle O is equal to the sum of the 3 shorter diameters, the diameter of circle O is 4 + 4 + 4 = 12, its radius is 6, and its circumference is 12π, so the quantities are equal.', '', '2023-02-26 13:11:11', 1),
(18, 1, ' A square has edges of length 12 inches.\nQuantity A : 24π\nQuantity B : The area of the largest circle that can fit inside the square\n', '', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'B', 'For Quantity B, the side of the square is the same length as the diameter of the circle. The diameter is twice the radius, so the radius is 6. fill this into the formula for area: A = πr2 to find that A = 36π. Quantity B is greater. ', '', '2023-02-26 13:11:11', 1),
(19, 1, ' A circle with a circumference of 12π is divided into three sectors with areas in a ratio of 3:4:5. What is the area of the largest sector?\n\n\n', '', 'Medium', 'Circle', '6π,9π,12π,15π,18π', 'D', ' The diameter of the circle is 12, so the radius is 6, and the area is 36π. The total number of parts in the ratio is 3 + 4 + 5 = 12, so each part covers an area of36π/12=3π . The largest ratio part is 5 times this amount, or 15π. \n\n', '', '2023-02-26 13:11:11', 1),
(20, 1, ' A circle is inscribed in a square with area 36. What is the area of the circle?\n\n', '', 'Medium', 'Circle', '', '9π', 'First, draw the circle inside a square. Because the square has an area of 36, each side is 6. This means that the diameter of the circle is 6 and the radius is 3. Using the circle area formula, the answer is 9π. ', '', '2023-02-26 13:11:11', 1),
(21, 1, 'Rectangle WXYZ has a length of 6 and a width of 2. Rectangle AYZB bisects right cylinders ABC and D. If all the cylinders have the same radius, what is the combined volume of the four half-cylinders?\n\n\n', 'Circle_Q21.jpg', 'Hard', 'Circle', '6π, 9π,12π,18π,21π', 'C', 'The four half-cylinders are equivalent to two cylinders of radius 1, whose total volume will therefore be 2(π126) = 12π. The answer is choice (C).', '', '2023-02-26 13:11:11', 1),
(22, 1, ' Inscribed square ABCD has a side length of 4. What is the area of the circle?\n\n', 'Circle_Q22.jpg', 'Medium', 'Circle', '2π,4π,6π,8π,10π', 'D', 'Draw in either diagonal of the square, which also is the diameter of the circle. You have now created two isosceles right triangles, so the length of the diagonal/diameter is4√2 , and the radius is 2√2. The area of the circle is π(2√2)2= 8π.', '', '2023-02-26 13:11:11', 1),
(23, 1, ' If the diameter of circle A is eight times that of circle B, what is the ratio of the area of circle A to the area of circle B?\n\n', '', 'Medium', 'Circle', '24:2,72:2,2:1,37:1,64:1', 'E', 'Fillin 4 for circle B’s diameter; thus circle A’s diameter is 32. The radius of A is 2, and the radius of B is 16; circle B has an area of 4π and circle A has an area of 256π. The ratio is 256π:4π, which reduces to 64:1.', '', '2023-02-26 13:11:11', 1),
(24, 1, ' On a rectangular coordinate plane, a circle centered at (0, 0) is inscribed within a square with adjacent vertices at (0, –2√2 ) and (2√2, 0). What is the area of the region, rounded to the nearest tenth, that is inside the square but outside the circle?', '', 'Medium', 'Circle', '', '3.4', 'First, draw and label the figure. Each of the triangles formed by the origin and the two vertices has legs of 2√2 and 2√2. Since each one is an isosceles right triangle—in other words, a 45-45-90 triangle—the sides are in the ratio x:x:x√2 , and the long side of each is 2√2 x √2 = 4. The long side of a triangle is also the side of the square, so the area of the square is 16. Since the side of the square is the same as the diameter of the circle, the diameter is 4, the radius is 2, and the area of the circle is 4π. The area inside the square but outside the circle, then, is 16 – 4π; use an approximation for π to get 16 – (4 × 3.14) = 3.44. Rounded to the nearest tenth, the answer is 3.4. ', '', '2023-02-26 13:11:11', 1),
(25, 1, 'Line segment AC is tangent to the circle with center O and CO = 5.\nQuantity A : Circumference of the circle\nQuantity B : 10π\n\n', '', 'Hard', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'B', 'A tangent to a circle forms a right angle with a radius drawn to the point of tangency. If CO is the hypotenuse of ΔOBC, then you know that the legs of the right triangle must be shorter than 5. Since OB is the radius of the circle, you know that the radius of the circle must be less than 5, so the circumference must be less than 10π.', '', '2023-02-26 13:11:11', 1),
(26, 1, 'The area of Circle A is increased by a factor of x to create Circle B.\nThe area of Circle B is increased by a factor of x to create Circle C.\nQuantity A : The ratio of the radius of Circle A to the radius of Circle C\nQuantity B : 1/x\n\n\n', 'Circle_Q26.jpg', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'C', 'Try filling in 5 for x. If circle A has an area of 9π, it has a radius of 3. Circle B then has an area of 9π × 5 = 45π. Circle C has an area of 45π × 5 = 225π, with a radius of 15. Therefore, the ratio of circle A’s radius of 3 to circle C’s radius of 15 is 1:5 or 1:x. Alternatively, note that circle C’s area is the area of circle A times x2, making the ratio of the areas 1:x2. The ratio of the radii should be the square root of this ratio, because area is πr2, giving you the ratio 1:x. Both solution methods prove that the quantities are equal', '', '2023-02-26 13:11:11', 1),
(27, 1, 'In the figure above, if the area of the smaller circular region is the area of the larger circular region, then the diameter of the larger circle is how many inches longer than the diameter of the smaller circle?\n\n\n', 'Circle_Q27.jpg', 'Medium', 'Circle', '√2 – 1, ½,√2/2,. (2 - √2)/2,√2', 'D', 'The diameter of the larger circle, in inches, is 1, so the radius is π(1/2)2 = π/4  . Therefore, the area of the larger circle is , and the area of the smaller circle is half this area, π/8 . Setting this amount equal to the area formula allows you to determine the radius of the smaller circle: πr2 = π/8; r = √2/4 . Therefore, the diameter is √2/2 . Subtract this amount from 1 (the diameter of the larger circle):1- √2/2=(2-√2)/2', '', '2023-02-26 13:11:11', 1),
(28, 1, 'Quantity A : AB + CD \nQuantity B : The circumference of the circle with center O\n\n', 'Circle_Q28.jpg', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'B', 'Fill in a value for the radius of the circle, say r = 2, making the diameter 4; and are both diameters of the circle, so Quantity A is 8. The circumference of the circle is 4π ≈ 12, so Quantity B is greater.', '', '2023-02-26 13:11:11', 1),
(29, 1, ' Points A and B lie along the circumference of a circle with center O. A second circle with center M has a radius one-third as long as that of the circle with center O. If the area of sector AOB is equal to the area of the circle with center M, then what is the measure in degrees of ∠AOB?', '', 'Medium', 'Circle', '', '40', 'Try to fill In. If circle O has a radius of 6, it has an area of πr2 = 36π; circle M, then, has a radius of 2 and an area of 4π. If sector AOB has an area of 4π out of a total area of 36π, then the sector takes up 4π/36πof the entire circle, and ∠AOB represents 1/9 of 360°. The correct answer is thus 1/9 × 360 = 40. ', '', '2023-02-26 13:11:11', 1),
(30, 1, ' No line segment with endpoints on the circle with center O is longer than line segment DC. OA = AD = 3\nQuantity A :  The area of sector OABC\nQuantity B : 9\n\n\n', 'Circle_Q30.jpg', 'Medium', 'Circle', 'Quantity A is greater.,Quantity B is greater.,The two quantities are equal.,The relationship cannot be determined from the information given.', 'A', 'Note that OD must be a diameter because it is the longest possible line segment crossing the circle. OA and OD (draw it in) are both radii, and therefore equal in length (3), and both of them are equal to AD. Therefore, triangle OAD is equilateral, and the measure of ∠AOD is 60°. The central angle for sector OABC is 120° (the supplement to 60°), making this sector’s area the area of the circle: 1/3X32π = 3 π Because π is slightly greater than 3, 3π is slightly greater than 9, giving you choice (A) for the answer.', '', '2023-02-26 13:11:11', 1),
(31, 1, 'An interior designer decides to accent a wall with an evenly spaced row of stenciled circles. The wall is 31′6″ long and the stencil has an area of 36π square inches. If the designer wants to leave a space of x inches between each circle and at either end of the row, and x is an integer, then what is the greatest possible number of circles that the designer can use?', '', 'Hard', 'Circle', '', '29', 'Draw a rough sketch of the wall, the circles, and the spaces. Notice that there is one space for every circle, plus one more space at the end. The area of each circle is 36π, so r = 6, and the diameter of each circle is 12 inches. Convert the length of the wall into inches:31 × 12 = 373 inches, plus the extra 6 inches equals 379 inches. You know that the wall in covered in a certain number of circles plus spaces. Let the distance covered by a circle and a space be represented as (12 + x), and the number of circles be represented as y, so now you have y(12 + x) . You also know that there is an extra space, so add an extra x to the end, and this is now the total length of the wall. So, y(12 + x) + 1 = 379 . The question tells us that x must be an integer, and that you need the greatest number of circles, and thus you want x to be as small as possible. Avoid solving the equation and try fillging in 1 for x, since it’s the smallest positive integer. Now the equation becomes y(12 + 1) + 1 = 379, and you can solve for y . So, 13y + 1 = 379 and 13y = 378, leading to y = 29. ', '', '2023-02-26 13:11:11', 1),
(32, 1, ' 1/r of a circular pizza has been eaten. If the rest of the pizza is divided into m equal slices, then each of these slices is what fraction of the whole pizza?\n', '', 'Medium', 'Circle', 'r/m,(r-1)/rm, 1/m,(m-1)/m,(m-r)/m', 'B', 'To solve this one, fill In for r and m: Try r = 2 and m = 4. If of the pizza has been eaten, and the remaining 1/2 is divided into 4 equal slices, then each of those remaining pieces is 1/8 of the whole pizza. Now fill in 2 for r and 4 for m in the answer choices; only choice (B) hits your target answer of  1/8', '', '2023-02-26 13:11:11', 1),
(33, 1, '16. A single slice cut from the center of a circular pizza has an edge length (from the center of the pizza to the edge of the crust) of 5″, has an arc length of 1.25π″, and weighs 4 ounces. If a serving weighs 8 ounces, then, to the nearest integer, what is the largest number of servings that six 6″ diameter pizzas can yield? (Note that servings must weigh 8 ounces, but they do not need to be equal in shape.)', '', 'Hard', 'Circle', '1,4,6,8,9', 'D', 'The original slice is cut from a pizza with a diameter of 10, and therefore a circumference of 10π. This slice represents1.25π/10π=1/8 of the circumference and therefore 1/8   of the area,25π/4   which weighs 4 ounces. A serving weighs 8 ounces, which covers double the area,  The area of the six pizzas is (6)π32 = 54π. Dividing this by the area of one serving gives you the total number of servings that the six pizzas represent:54π/(25π/4)  =8 16/25=8.64 . The six pizzas yield 8 servings.', '', '2023-02-26 13:11:11', 1),
(34, 1, 'Quantity A : x\nQuantity B : 70', 'TRI_Q1.jpg', 'Easy', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'A', 'The interior angles of a triangle add up to 180°, therefore, x = 110.', '', '2023-02-26 13:11:11', 1),
(35, 1, 'In the figure above, if ABCD is a rectangle, then what is the perimeter of ΔBCD?', 'TRI_Q2.jpg', 'Medium', 'Traingles', '30,32,34,40,44', 'A', ' In a rectangle, opposite sides are equal, and each angle measures 90 degrees. Triangle ABD is a 5-12-13 right triangle, so BD = 13. Furthermore, BC = 12, and CD = 5. To find the perimeter of any figure, add the lengths of the sides. In this case, 5 + 12 + 13 = 30, so the answer is choice (A). \n\n', '', '2023-02-26 13:11:11', 1),
(36, 1, 'In the figure above, WX = XY and points W, Y, and Z lie on the same line. What is the value of q?', 'TRI_Q3.jpg', 'Medium', 'Traingles', '', '105', 'There are 180 degrees in both a straight line and a triangle. In the figure, ∠XWY and ∠XYW are congruent and their measures add up to 180° − 30° = 150°, so each angle measures 75°. A straight line measures 180°, so q = 180 − 75 = 105. \n\n', '', '2023-02-26 13:11:11', 1),
(37, 1, 'In square ABCE, AB = 4.\nQuantity A : 24\nQuantity B : The perimeter of polygon ABCDE\n', 'TRI_Q4.jpg', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'A', 'ΔCDE has equal angles, so it is equilateral. ABCE is also equilateral, as are all squares. To find the perimeter of any figure, add up all of the side lengths on the outside of the figure. In this case, 5 equal segments of length 4 result in a perimeter of 20, so Quantity A is greater.', '', '2023-02-26 13:11:11', 1),
(38, 1, ' In the figure above, what is the value of (a+b+c)/30  ? \n', 'TRI_Q5.jpg', 'Easy', 'Traingles', '4,6,8,10,16', 'B', 'All three angles of the triangle add up to 180°. 30 goes into 180 six times. The answer is choice (B).', '', '2023-02-26 13:11:11', 1),
(39, 1, 'The length of line segment AC is 3/4 the length of line segment AB.\nQuantity A : BC\nQuantity B : 6\na. Quantity A is greater.\nb. Quantity B is greater.\nc. The two quantities are equal.\nd. The relationship cannot be determined from the information given.', 'TRI_Q6.jpg', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'B', 'AC has a length of 3, so you can use Pythagorean theorem, or recognize the Pythagorean triple, to find that BC has a length of 5. The answer is choice (B). ', '', '2023-02-26 13:11:11', 1),
(40, 1, ' A ship captain sails 500 miles due south and then 1,200 miles due east.\nQuantity A :  1,350 miles\nQuantity B : The minimum number of miles the captain must sail to return to his original position', '', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'A', 'Draw a right triangle representing the captain’s route so far and the path back to his starting point: A right triangle with legs of 500 and 1,200 is a multiple of the familiar 5-12-13 triangle, so the hypotenuse—and the number of miles the captain must sail to return to his original position—is 1,300. The answer is choice (A). \n', 'TRI_A7.jpg', '2023-02-26 13:11:11', 1),
(41, 2, 'What is the area of the rectangle shown above?\n', 'TRI_Q8.jpg', 'Medium', 'Traingles', '4,6,8,10,12', 'E', 'Recognize the 3-4-5 triple or use the Pythagorean theorem to find that the missing side length of the rectangle is 4. The area of the rectangle is bh = 3 × 4 = 12, so the answer is choice (E). ', '', '2023-02-26 13:11:11', 1),
(42, 2, ' In triangle ABC, side AB has a length of 12, and side BC has a length of 5.\nQuantity A : The length of side AC\nQuantity B : 7\n', '', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'A', 'The Third Side Rule states that the third side in any triangle must be shorter than the sum of, and longer than the difference between, the other two sides. Hence, the third side of this triangle must be greater than 7, and less than 17. Quantity A is greater.', '', '2023-02-26 13:11:11', 1),
(43, 2, 'A hiker left her tent and traveled due east for 5 miles, then traveled due south for 24 miles, then due east for 5 miles, arriving at a hut. What is the straight-line distance from her tent to the hut?\n', '', 'Medium', 'Traingles', '13,20,26,28,29', 'C', 'First, draw the picture (see below). Notice that this makes two right triangles, each with legs of 5 and 12. Either recognize the 5-12-13 triple or use the Pythagorean theorem to see that the distance is 13 + 13 = 26. ', 'TRI_A10.jpg', '2023-02-26 13:11:11', 1),
(44, 2, '11. Two sides of a triangle are 4 and 8. Which of the following is a possible length of the third side of the triangle? Indicate all possible values.\n\n', '', 'Medium', 'Traingles', '3,4,5,6,7,8,12', 'C, D, E, and F', 'The Third Side Rule states that the third side of any triangle must be greater than the difference between the other two sides and less than the sum of the other two sides. Therefore, the third side of the triangle in the question must be between 4 and 12, and you can eliminate any choices outside this range. The only choices in this range are 5, 6, 7, and 8, the correct answers.', '', '2023-02-26 13:11:11', 1),
(45, 2, 'Triangle ABC is not equilateral, and angle ABC = 60 degrees.\nQuantity A : The angle opposite the shortest side of the triangle\nQuantity B : 60 degrees.\n\n', '', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'B', 'The smallest angle in a triangle is always opposite the shortest side. If angle ABC is 60 degrees, the other two angles total 180° – 60° = 120°. The triangle isn’t equilateral, the remaining two angles cannot both be 60°. Therefore, the smaller angle must be less than 60°, and Quantity B is greater.\n\n', '', '2023-02-26 13:11:11', 1),
(46, 2, 'Quantity A : a + b\nQuantity B : 200\n', 'TRI_Q13.jpg', 'Hard', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'C', 'Start by finding the remaining angles of the triangle on the right: If the two small angles add up to 20° + 40° = 60°, then the unmarked angle must be 120°, and b must be 60. The remaining angle in the triangle on the left must be 40°, and a must be 140. So Quantity A is 140 + 60 = 200; the quantities are equal.\n\n', '', '2023-02-26 13:11:11', 1),
(47, 2, 'John and James walk from point x to point z (shown in the figure above). John walks directly from x to y on Path a and then directly from y to z on Path b. James walks directly from x to z on Path c. If Path a is 13 miles long and Path b is 5 miles long, John walks about how many miles longer than James?\n', 'TRI_Q14.jpg', 'Medium', 'Traingles', '2,3,4,5,6', 'C', 'Use the Pythagorean theorem to find the length of path C: 5^2 + 13^2 = c^2. So path c is approximately 14 miles. John walks 18 miles, and James walks 14 miles, so the answer is choice (C).', '', '2023-02-26 13:11:11', 1),
(48, 2, 'Quantity A : BF \nQuantity B : 7√2\n', 'TRI_Q15.jpg', 'Hard', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'C', 'Although the figure may look complex, it’s really just three 45-45-90 triangles attached end-to-end; BF is the sum of the long sides of  the three triangles. If AB = 2, then AC = 2, and BC =2√2 ; similarly, EG and FG are 2, and EF = 2√2. Two of the angles in triangle DCE are vertical angles with 45° angles in the other two triangles, so it must be a 45-45-90 triangle also—the legs are each 3, so CE =3√2 . So BF =2√2 + 2√2 + 3√2 = 7√2; the quantities are equal.', '', '2023-02-26 13:11:11', 1),
(49, 2, 'Quantity A : r\nQuantity B : p + q – 1', 'TRI_Q16.jpg', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'D', 'According to the Third Side Rule, r must be less than the sum of p and q. Plug In to test if r is less than p + q − 1. Let p = 5 and q = 4. If r = 2, Quantity A is 2 and Quantity B is 8; Quantity B is greater, so eliminate choices (A) and (C). However, a value of 8 for rwould also satisfy the Third Side Rule; now the quantities are equal, so eliminate choice (B) and select choice (D). \n\n', '', '2023-02-26 13:11:11', 1),
(50, 2, 'In the figure above, FG = 4, and FH is a diameter of the circle. What is the area of the circle? \n. \n', 'TRI_Q17.jpg', 'Medium', 'Traingles', '4π,8π,12π,16π,20π', 'D', 'This is a 30-60-90 triangle, so FH = 8. If the diameter is 8, then the radius is 4, so the area is 16π. ', '', '2023-02-26 13:11:11', 1),
(51, 2, 'Quantity A : (AB)2 + (AD)2\nQuantity B : (AC)2\n\n', 'TRI_Q18.jpg', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'D', 'Although the Pythagorean theorem dictates that (AB)2 + (AD)2—the sum of the squares of two sides of a right triangle—is equal to the square of the hypotenuse, or (BD)2, there’s no way to determine the relationship between (BD)2 and (AC)2. Remember, figures are not drawn to scale on the GRE: Although it looks like AC is longer than BD, it’s possible to redraw the figure so that either segment is longer; try varying the length of DC', '', '2023-02-26 13:11:11', 1),
(52, 2, 'If the area of the above triangle is 8√3 what is the length of side AB? \n\n', 'TRI_Q19.jpg', 'Medium', 'Traingles', '3,4,4√3, 6√3,8√3', 'B', 'Fill in the answers, and be sure to note that this is a 30-60-90 triangle. In choice (B), if AB is 4 and AC is 4√3 , then the area is ½  X 4 X 4√3 = 8√3 . So the answer is choice (B).', '', '2023-02-26 13:11:11', 1),
(53, 2, 'Mei is building a garden in the shape of an isosceles triangle with one side of 10. If the perimeter of the garden is 32, which of the following is a possible area of the garden? \n', '', 'Hard', 'Traingles', '32,48,50,60,64', 'B', 'If the triangle is isosceles, it must have two equal sides; thus, the triangle could have sides of 10, 10, and 12 or sides of 10, 11, and 11. To find one of the possible areas, draw out your 10-10-12 triangle. With the height drawn in, it should look like this: \n                                      \nNote that the big triangle divides nicely into two of the familiar 6-8-10 triangles; you now have a triangle with a base of 12 and a height of 8, so the area is × 12 × 8 = 48. The answer is choice (B). \n', 'TRI_A20.jpg', '2023-02-26 13:11:11', 1),
(54, 2, 'Quantity A : The area of an equilateral triangle with a side length of 4\nQuantity B : The area of an isosceles right triangle with a hypotenuse of 4√2\n\n', '', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'B', 'In Quantity A, an equilateral triangle with a side length of 4 has a base of 4 and a height of 2√3: remember, an equilateral triangle cut in half yields two 30-60-90 triangles. Thus, the triangle has an area of (½)x4x2√3  , or . Remember that √3is approximately1.7, so 4√3 is about 6.8. In Quantity B, “isosceles right triangle” means 45-45-90, so a long side of 4√2 yields a base and a height both equal to 4, and an area of × 4 × 4, or 8. Quantity B is greater.', '', '2023-02-26 13:11:11', 1),
(55, 2, '7. Towns A, B, and C lie in a plane but do not lie on a straight line. The distance between Towns A and B is 40 miles, and the distance between Towns A and C is 110 miles.\nQuantity A : The distance between Towns B and C\nQuantity B :  60 miles\n', '', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'A', 'If the towns do not lie on a straight line, they must lie on a triangle; Quantity A represents the third side of the triangle. According to the Third Side Rule this side must be greater than the difference between, and less than the sum of, of the other two sides. Thus, Quantity A lies between 110 − 40 = 70 miles and 110 + 40 = 150 miles, but is always greater than 60 miles; the answer is choice (A).', '', '2023-02-26 13:11:11', 1),
(56, 2, 'Point A is both in the interior of triangle B and on line C. If A, B, and C are in the same plane, in how many places does line C intersect triangle B?\n', '', 'Medium', 'Traingles', 'ZERO,ONE,TWO,THREE,FIVE', 'C', 'Draw a triangle with a point inside. Draw a line through the point to see how many places the line intersects with the triangle. There are many ways to draw the line, but each way intersects the triangle at two points.\n\n', '', '2023-02-26 13:11:11', 1),
(57, 2, 'A photographer is using a bipod to steady his camera while taking pictures, as shown in the figure above. The legs of the bipod are 5 feet long and are currently 6 feet apart. If he pulls the legs another 2 feet apart, the top of the bipod drops x feet.\nQuantity A : 1\nQuantity B : x\n', 'TRI_Q24.jpg', 'Hard', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'C', 'Split the initial triangle into two right triangles. The figure should look like this: \n                                    \nThe smaller triangles are the familiar 3-4-5 triangles, with a height of 4. When the photographer pulls the legs another 2 feet apart, your figure looks like this:\n                      \n Again, the smaller triangles are 3-4-5 triangles, but now the height is 3. Because x is the change in the triangle’s height, x = 1, so the quantities are equal.\n', 'TRI_A24a.jpg', '2023-02-26 13:11:11', 1),
(58, 2, ' If triangle ABC is equilateral and side AB has a length of s, then what is the area of triangle ABC in terms of s?\n\n', '', 'Medium', 'Traingles', ' s3(√3/4),s2(√2/2),s2(√2/2),s√3,s√2', 'A', 'First, draw your figure and write out the area formula A=1/2 bh for triangles, Then, plug in a number for s; try s = 6. In order to find the height of an equilateral triangle, you need to draw an altitude from the top vertex down the middle to the opposite base, creating two 30-60-90 right triangles. The height of this equilateral triangle is , so the area formula is(1/2)X6X3√3 = 9√3. Now plug 6 in for s in the answer choices. Eliminate choices (C) and (E) because they have the wrong root. Of the remaining answers, only choice (A) yields the target answer of9√3: (s2/4) √3. = (36/4) √3 = 9√3', 'TRI_A24a.jpg', '2023-02-26 13:11:11', 1),
(59, 2, 'In the figure above, equilateral triangle OPQ is inscribed in the central angle of the circle and has perimeter 18. What is the area of circle O?\n \n\n', 'TRI_Q25.jpg', 'Medium', 'Traingles', '6π,12π,18π,36π,72π', 'D', 'The triangle is equilateral, so dividing the perimeter by 3 gives you the length of 6 for each side. Angle POQ is the central angle of the circle, so sides OP and OQ are also radii of the circle. Thus, the area of the circle is πr2 = π62 = 36π, so the answer is choice (D).', '', '2023-02-26 13:11:11', 1),
(60, 2, 'Quantity A : The length of the side of a square with diagonal √50\nQuantity B : The height of an equilateral triangle with side 6\n', '', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'B', 'A square cut in half from corner to corner yields two 45-45-90 triangles, so a diagonal of √50—also known as 5√2 —gives a side of 5. The height of an equilateral triangle splits it into two 30-60-90 triangles, so a side of 6 gives a height of3√3. To compare, express both sides as square roots: 5 is equal to√25, and 3√3 is equal to√27 . Quantity B is greater. ', '', '2023-02-26 13:11:11', 1),
(61, 2, 'In a triangle, one angle is twice as large as the smallest angle, and another angle is three times as large as the smallest angle. What is the measure of the largest angle?\n\n', '', 'Medium', 'Traingles', '30°,45°,60°,75°,90°', 'E', 'If x is the measure of the smallest angle, then the other two angle are 2x and 3x. The sum of the angles is 180˚, so x + 2x + 3x = 180. Solve the equation to find x = 30, which means the largest angle measures 90˚.', '', '2023-02-26 13:11:11', 1),
(62, 2, 'The area of ΔJKL is 65.\nQuantity A : KL\nQuantity B : LM\na. Quantity A is greater.\nb. Quantity B is greater.\nc. The two quantities are equal.\nd. The relationship cannot be determined from the information given\n', 'TRI_Q28.jpg', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'A', ' Triangle JKM is the familiar 5-12-13 triple, but doubled, so KM = 24. KL may look the same length as LM, but remember that figures are not drawn to scale. In any triangle, the height is always measured perpendicular to the base from the opposite vertex. So the height of triangle JKL is the length of JM, 10. You are given the area of triangle JKL, so plug all the information you know into the area formula for triangles: A=1/2 bh ; 65 = 1/2 (KL)(10) (KL)(10);  KL = 13. Subtracting KL from KM gives you LM: 24 − 13 = 11; LM = 11. Quantity A is 13, and Quantity B is 11, so the answer is choice (A). \n\n', '', '2023-02-26 13:11:11', 1),
(63, 2, ' Given four rods of length 1 meter, 3 meters, 5 meters, and 7 meters, how many different triangles can be made using one rod for each side? \n', '', 'Medium', 'Traingles', '6,4,3,2,1', 'E', 'According to the Third Side Rule for triangles, the longest side of a triangle must be shorter than the sum of the other two sides. Write out all the possible combinations of sides: 1, 3, 5; 1, 3, 7; 3, 5, 7; 1, 5, 7. The only possible combination of sides that obeys the Third Side Rule is 3, 5, 7.', '', '2023-02-26 13:11:11', 1),
(64, 2, ' How much greater, in square inches, is the area of a square with a diagonal of 8 inches than the area of a square with a diagonal of 4 inches? \n', '', 'Medium', 'Traingles', '4,24,32,48,96', 'B', 'Draw your own figures. The diagonal of a square creates 45-45-90 triangles with sides in the ratio of x : x : x√2 . So, the larger square has a diagonal of x√2 = 8. Divide by  √2 to find the side length,8/√2 . The area is (8/√2)2= 32. The smaller square has a diagonal of x√2 = 4. Divide by to find the side length,4/√2. The area is (4/√2)2 = 8. The area of the larger square is 32 − 8 = 24 greater than that of the smaller square. \n\n', '', '2023-02-26 13:11:11', 1),
(65, 2, 'In the rectangle above, a – b > b – a.\nQuantity A : z^2 – 2x^2\nQuantity B : 0\n\n', 'TRI_Q31.jpg', 'Medium', 'Traingles', 'Quantity A is greater., Quantity B is greater.,The two quantities are equal., The relationship cannot be determined from the information given.', 'B', 'Manipulate a – b > b – a to get a > b; hence y, which is the same length as the side across from b, is shorter than x, which is the same length as the side across from a. The diagonal divides the rectangle into two right triangles. According to the Pythagorean theorem, z2 = x2 + y2, so z2 − x2 − y2 = 0 because x > y, x2 > y2. So in Quantity A you are subtracting more than x2 − y2 from z2. Therefore, z2 – 2x2 < 0, so the answer is choice (B). ', '', '2023-02-26 13:11:11', 1),
(66, 2, ' The image of a star is projected onto a planetarium wall by a projector that sits atop a vertical 4-foot stand. If the projector is directed 30 degrees above the horizontal, and the image appears 16 feet above the level floor of the planetarium, then, in feet, how far is the projector from the wall?\n\n', '', 'Medium', 'Traingles', '12√2,12√3,16√2,16√3,16', 'B', 'Draw your figure as a right triangle atop a rectangle. The hypotenuse represents the path of the image on the wall, and the rectangle’s dimensions represent the height of the stand and its distance from the wall. It should look like this:\n                             \nThe triangle on top is a 30-60-90 triangle with a short side of 16 − 4 = 12; so the side across from the other leg (the distance from the projector to the wall) is 12√3so the answer is choice (B). \n', 'TRI_A32.jpg', '2023-02-26 13:11:11', 1),
(67, 2, ' What is the area of the shaded region in the figure above, in terms of a, b, and c?\n\n', 'TRI_Q33.jpg', 'Hard', 'Traingles', ' √3 (a^2 + b^2 + c^2), √3/2 (a^2 - b^2 - c^2),√3/2 (a^2 - b^2 + c^2),√3/2 (a^2 + b^2 - c^2), √3/2 (a2 + b2 + c2)', 'C', 'The ratio of the given leg to the hypotenuse is √3 to 2 in the largest right triangle, so it is a 30-60-90 triangle, and the length of the other leg must be a. The smaller two triangles also contain 90 degree angles, and all three triangles share the left vertex angle, making all three triangles similar with proportional sides. So, the horizontal leg of the smallest triangle is crt3, and the horizontal leg of the medium sized triangle is brt3. To find the area of the shaded region, find the area of the large triangle, subtract the area of the medium sized one, and add back the area of the smallest one. Fill in values: a = 4, b = 2, c = 1. The area of the large triangle becomes ½ x (4√3)(4) = 8√3The area of the medium triangle becomes ½ x(2√3)x2 = 2√3  The area of the smallest triangle becomes ½ x √3 x 1 = √3/2.The shaded area is 8√3 - 2√3 +√3/2 = (13√3)/2. When you fill in the three values into each answer, only choice (C) hits your target, making it the correct answer. ', '', '2023-02-26 13:11:11', 1),
(68, 2, 'A boat travels due east for 3 kilometers, makes a right turn and heads due south for 12 kilometers, and finally makes a left turn and travels due east again for 6 more kilometers. What is the distance between the boat’s starting and ending locations?___', '', 'Hard', 'Traingles', '', '15', 'To solve this question, picture a triangle:\n                           \n Since the boat travels a total of 3 + 6 = 9 kilometers east, and a total of 12 kilometers south, we can use the Pythagorean theorem to find the total distance. Since a2 + b2 = c2, then 92 + 122 = c2, and 81 + 144 = 225 = c2. Taking the square root of both sides find the total distance. Since a + b = c , then 9 + 12 = c , and 81 + 144 = 225 = c . Taking the square root of both sides gives that c = 15, the correct answer. \n', 'TRI_A34.jpg', '2023-02-26 13:11:11', 1),
(69, 2, 'In triangle ABD pictured above, AC = 4 and is perpendicular to BD , which is equal to 125% the length of AC . What is the area of triangle ABD?____', 'TRI_Q35.jpg', 'Medium', 'Traingles', '', '10', 'To solve this question, label everything. First label angle ACD as a right angle. Next, label AC = 4. If BD = 125% of AC, then BD = (125/100)X 4= 5/4  X 4=5 . Since and are perpendicular, can be the base and can be the height. Since the formula for the area of a triangle is Area = ½ bh the area here equals the correct answer is 10. ', '', '2023-02-26 13:11:11', 1),
(70, 2, 'If BC is 3, CD is 5, and AE is 8, what is DE?\n', 'TRI_Q36.jpg', 'Medium', 'Traingles', '3,4,5,6,10', 'C', 'This question is testing similar triangles. Do you recognize the 3-4-5 triangles? Triangle BCD is a 3-4-5 triangle, and triangle ACE is too, but it’s a similar triangle—a 6-8-10 triangle. That means that CE is 10, which leaves 5 left over for DE.', '', '2023-02-26 13:11:11', 1),
(71, 2, 'ΔABC above is an isosceles triangle in which AB = AC. What is the area of ΔABC?\n', 'TRI_Q37.jpg', 'Medium', 'Traingles', '30,24,20,15,12', 'E', 'To find the area of this triangle, you must drop a line segment to make the height. If you call the midpoint of BC point X, you know that BX is equal to 3. If you see that this makes a right triangle with a side of 3 and a hypotenuse of 5, you can use the 3-4-5 triangle rule to get 4 for the height. Otherwise, use the Pythagorean theorem. After you find the height of 4, use the formula for area of a triangle. The base, 6, multiplied by the height, 4, gives you 24. Divide by 2 to get 12. ', '', '2023-02-26 13:11:11', 1),
(72, 2, ' A triangle has sides measuring 7 cm and 12 cm. Which of the following are possible values for the perimeter of the triangle? Indicate all possible values.\n', '', 'Medium', 'Traingles', '22cm,24 cm,26 cm,28 cm,30 cm,34 cm,38 cm', ' C, D, E, and F ', 'The Third Side Rule tells you that the third side must be more than the difference of the two other sides and less than their sum. Therefore, the third side must be greater than 5 and less than 19. The two known sides already add up to 19. If you add this to the range for the third side, the perimeter of the triangle is then between 24 and 38 centimeters. Choices (C), (D), (E), and (F) correct', '', '2023-02-26 13:11:11', 1),
(73, 2, '\n In right triangle LMN, the ratio of the longest side to the shortest side is 5 to 3. If the area of LMN is between 50 and 150, which of the following could be the length of the shortest side? Indicate all possible values.\n\n', '', 'Medium', 'Traingles', '3,6,9,12,15,18', 'C and D', 'Draw and label the figure, and then set up your scratch paper to plug in the answers. For a given short side, use the 5:3 ratio to find the long side, and use either the Pythagorean theorem or multiples of the familiar 3-4-5 triangles to determine the middle side; since LMN is a right triangle, the two shorter sides can be used as base and height to find the area. Start with choice (C). If the short side is 9, the middle side is 12 and the area becomes 54; this choice is correct, but just barely, and if you try smaller values you will fall out of the area’s range. Eliminate choices (B) and (A). In choice (D), the short and middle sides are 12 and, 16 and the area is 96; this choice is correct. In choice (E), the short and middle sides are 15 and 20, and the area is 150. This is not in the area’s range of 50 to 150, so eliminate it as well as choice (F), which would produce an even larger area. The correct answers are choices (C) and (D).', '', '2023-02-26 13:11:11', 1);
INSERT INTO `questionbank` (`id`, `question_papper_id`, `question`, `que_image`, `level`, `topic`, `options`, `answer`, `explanation`, `ans_image`, `insDate`, `status`) VALUES
(74, 2, 'Note: Figure not drawn to scale \nWhich of the following are possible side lengths of triangle CDE? Indicate all possible values.\n\n', 'TRI_Q40.jpg', 'Medium', 'Traingles', '2, 3, and 4,6, 8, and 10,6, 8, and 14, 8, 12, and 16,12, 15, and 20,16, 24, and 32,16, 24, and 40', ' A, D, and F', 'Triangles ABC and CDE are similar triangles: The angles where the triangles meet are equal, as are the angles marked jº, so the remaining angles must be equal as well. Since similar triangles have proportional sides, any answer choice in the ratio of 4:6:8 will work. Choice (A) is 4:6:8 cut in half, so choice (A) works; remember the figure isn’t drawn to scale, so don’t worry about making CDE smaller than ABC. Choices (D) and (F) are 4:6:8 multiplied by 2 and 4, respectively, so both work as well. None of the remaining choices work: Choices (C) and (G), in fact, violate the Third Side Rule and aren’t even triangles. ', '', '2023-02-26 13:11:11', 1),
(75, 2, 'In the figure above, BC = 8. What is the area of triangle ABC?', 'TRI_Q41.jpg', 'Medium', 'Traingles', '', '16', 'According to the information given, this must be a 45-45-90 isosceles right triangle, and the relationship between the sides can be written as x√2 . That means that BC =x√2, or 8 =x√2. Solving for x, you get x =(8/√2) , so each of the legs of the triangle is equal to (8/√2) . The formula for the area of a triangle is 1/2  (base)(height), so the area of this triangle is ½ x (8√2) x (8/√2) = 64/4 = 16 . ', '', '2023-02-26 13:11:11', 1),
(76, 2, 'The circle above has center O and circumference 12π. If ∠POQ = 30°, what is the area of the unshaded region?________', 'TRI_Q42.jpg', 'Medium', 'Traingles', '', ' 33π ', 'The formula for the circumference of a circle is circumference = 2πr, so if the circumference is 12π, then the radius must be 6. The formula for the area of a circle is area = πr2 so the area of the circle is 36π. From the question you know that ∠POQ = 30°. The entire circle has 360°, so the shaded region takes up30/360=1/12 of the entire circle. , (36π)X 1/12  =3π  so the area of the shaded region is 3π. The shaded area formula is total area – shaded area = unshaded, so you have 36π – 3π = 33π', '', '2023-02-26 13:11:11', 1),
(77, 2, 'A parabola follows the function f(x) = x2 – 7x + 3. Point A lies on the parabola at (2, s), and point B lies on the parabola at (6, t). What is the distance from A to B, rounded to the nearest hundredths place?', '', 'Medium', 'Traingles', '', '5.66', 'Don’t worry if the parabola seems unfamiliar—it’s really just providing you with a way to find the y-values for the given x-values. Filling in 2 in for x gives you –7 for y, so point A is located at (2, –7); using the same process, you can find that point B is located at (6, –3). Plot the two points on a coordinate grid, and make a right triangle by adding a vertex at (2, –3) or (6, –7). Either way, you have a right triangle with short sides of 4, so it’s a 45-45-90 triangle, and the long side is4√2. Use your on-screen calculator to determine the final approximate value, 5.66. ', '', '2023-02-26 13:11:11', 1),
(78, 2, '15. Floyd is planting a garden in a triangular plot. One side of the plot measures 5√3, and a second side measures 7√11. Which of the following are possible values for the third side of the garden? Indicate all possible values.\n', '', 'Medium', 'Traingles', '6√2,8√3,11√5,17√3,26√2,17√7', 'C and D ', 'First calculate values for 5√3 and 7√11: The first is approximately 8.66, and the second is approximately 23.22. The third side of a triangle must be greater than the difference of the other two sides and less than the sum of the other two sides; hence, the third side of the garden must measure between 14.56 and 31.88. Calculating for the value of the roots, you will find that only choices (C) and (D) fall within this range. ', '', '2023-02-26 13:11:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionpapper`
--

CREATE TABLE `questionpapper` (
  `qpid` int(11) NOT NULL,
  `quspapper_name` varchar(100) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionpapper`
--

INSERT INTO `questionpapper` (`qpid`, `quspapper_name`, `faculty_id`, `status`) VALUES
(1, 'MCQ', 0, 1),
(2, 'FIB', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_paper_mapping`
--

CREATE TABLE `question_paper_mapping` (
  `id` int(11) NOT NULL,
  `question_papper_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1-Completed,0-Pending',
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_paper_mapping`
--

INSERT INTO `question_paper_mapping` (`id`, `question_papper_id`, `student_id`, `status`, `created_at`, `modified_at`) VALUES
(1, 1, 6, 0, '2023-02-27 04:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_papper_map`
--

CREATE TABLE `question_papper_map` (
  `id` int(11) NOT NULL,
  `apids` int(11) NOT NULL,
  `qpname` varchar(100) NOT NULL,
  `fid` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `question` text NOT NULL,
  `que_image` varchar(101) NOT NULL,
  `level` varchar(11) NOT NULL,
  `topic` varchar(150) NOT NULL,
  `options` varchar(250) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(50) NOT NULL,
  `explanation` text NOT NULL,
  `ans_image` varchar(101) NOT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_result`
--

CREATE TABLE `question_result` (
  `id` int(11) NOT NULL,
  `question_papper_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `spendt` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_result`
--

INSERT INTO `question_result` (`id`, `question_papper_id`, `question_id`, `result`, `student_id`, `status`, `spendt`, `created_at`, `modified_at`) VALUES
(1, 1, 1, 'C', 6, 1, '00:09:53', '0000-00-00 00:00:00', '2023-02-27 02:51:22'),
(2, 1, 2, 'bbijhbh', 6, 1, '00:09:24', '2023-02-27 02:47:43', '2023-02-27 06:55:12'),
(3, 1, 3, 'D', 6, 1, '00:09:28', '2023-02-27 02:50:20', '2023-02-27 05:07:12'),
(4, 1, 5, 'C', 6, 1, '00:09:54', '2023-02-27 02:51:31', '2023-02-27 06:55:19'),
(5, 1, 1, 'A', 6, 1, '00:07:43', '2023-02-27 04:22:36', '2023-02-27 06:54:20'),
(6, 1, 37, 'A', 6, 1, '00:09:28', '2023-02-27 05:45:32', NULL),
(7, 1, 7, 'sasdfkmmdnfjofmnmf', 6, 1, '00:09:52', '2023-02-27 06:36:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_class_map`
--

CREATE TABLE `staff_class_map` (
  `id` int(11) NOT NULL,
  `staff_code` varchar(20) NOT NULL,
  `class_Id` int(11) NOT NULL,
  `CLASSSEC` varchar(20) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `staff_name` varchar(30) NOT NULL,
  `Sur_name` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Year_Id` int(11) NOT NULL,
  `Status` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_info`
--

CREATE TABLE `staff_info` (
  `sid` int(10) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `Sur_name` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `contact1` varchar(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `doj` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(21) NOT NULL DEFAULT '$345$',
  `address` varchar(320) NOT NULL,
  `aadhar` varchar(16) NOT NULL,
  `aadharImage` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `reportingto` varchar(50) NOT NULL,
  `centre` varchar(5) NOT NULL,
  `staff_type` varchar(50) NOT NULL,
  `status` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_info`
--

INSERT INTO `staff_info` (`sid`, `staff_name`, `Sur_name`, `contact`, `contact1`, `dob`, `doj`, `gender`, `job_type`, `Designation`, `email`, `password`, `address`, `aadhar`, `aadharImage`, `photo`, `qualification`, `reportingto`, `centre`, `staff_type`, `status`) VALUES
(3, 'Prabu', 'Rajan', '9600037999', '4534545645', '2022-11-27', '2022-12-04', 'Female', 'Full Time', 'WETRT', 'thenamachi@gmail.com', '$123$', 'WRER', '2534534534', 'aadharImage', 'photo', 'ad', '5654', 'All', 'Counsellor', '0'),
(4, 'Jaya', 'Kuamr', '9999999999', '656565', '2024-02-01', '2022-12-02', 'Male', 'Full Time', 'Manager', 'Jay@gmail.com', '$345$', 'fvdfbbb', '565556666', 'aadharImage', 'photo', 'BE', 'manage', 'KDM', 'Counsellor', '0'),
(5, 'kumar', 'Srinivas', '8988365656', '4444444444', '2022-02-07', '2022-12-29', 'Male', 'Full Time', 'Manager', 'srini@gmail.com', '$345$', 'sdsdvsv', '8888888888', 'aadharImage', 'photo', 'BE', 'Sr. Manager', 'KDM', 'Counsellor', '0'),
(6, 'Balaji', 'Sri', '8888888888', '9999999999', '1974-09-30', '2022-12-01', 'Male', 'Full Time', 'Manager', 'bal@gmail.com', '$345$', 'sdvv', '8888888888', 'aadharImage', 'photo', 'MBA', 'CEO', 'KDM', 'Sales', '0');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(10) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `Sur_name` varchar(50) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `contact1` varchar(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `doj` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `email` varchar(31) NOT NULL,
  `password` varchar(21) NOT NULL DEFAULT '$345$',
  `address` varchar(320) NOT NULL,
  `aadhar` varchar(16) NOT NULL,
  `aadharImage` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `reportingto` varchar(50) NOT NULL,
  `centre` varchar(5) NOT NULL,
  `staff_type` varchar(50) NOT NULL,
  `status` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `staff_name`, `Sur_name`, `contact`, `contact1`, `dob`, `doj`, `gender`, `job_type`, `Designation`, `email`, `password`, `address`, `aadhar`, `aadharImage`, `photo`, `qualification`, `reportingto`, `centre`, `staff_type`, `status`) VALUES
(6, 'Balaji', 'Sri', '8888888888', '9999999999', '1974-09-30', '2022-12-01', 'Male', 'Full Time', 'Manager', 'bal@gmail.com', '$345$', 'sdvv', '8888888888', 'aadharImage', 'photo', 'MBA', 'CEO', 'KDM', 'Sales', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student_enquiry`
--

CREATE TABLE `student_enquiry` (
  `StId` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `institution` varchar(150) NOT NULL,
  `qualification` varchar(150) NOT NULL,
  `student_mobile` varchar(10) DEFAULT NULL,
  `parent_mobile` varchar(11) NOT NULL,
  `enquiry_date` date NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(100) CHARACTER SET latin1 NOT NULL,
  `program` varchar(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `prefered_country` varchar(50) NOT NULL,
  `counsellor_id` varchar(20) NOT NULL,
  `counsellor_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `remarks` text NOT NULL,
  `sel_list` enum('Follow Up','Enrolled','Closed') DEFAULT NULL,
  `centre` varchar(25) NOT NULL,
  `Updated_DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_enquiry`
--

INSERT INTO `student_enquiry` (`StId`, `name`, `parent_name`, `institution`, `qualification`, `student_mobile`, `parent_mobile`, `enquiry_date`, `dob`, `course`, `program`, `source`, `email`, `gender`, `prefered_country`, `counsellor_id`, `counsellor_name`, `address`, `remarks`, `sel_list`, `centre`, `Updated_DateTime`, `status`) VALUES
(1, 'nama', 'nama', 'mgr', 'be', '3333333333', '5555555555', '2022-02-02', '2026-02-05', '1', '1', 'Database', 'nama@gmail.com', 'Male', 'Dubai', '12', 'namachi', 'dvdvd', 'fvfdvdf', NULL, '1', '2022-12-05 07:02:55', 1),
(2, 'siva', 'siva', 'svvv', 'fdvdvdfv', '1111111111', '2222222222', '2022-12-02', '2022-12-09', '1', '1', 'Database', 'sdcs@fvf.com', 'Male', 'Netherlands', '123', 'vfdvdv', 'svsvsv', 'vv', NULL, '1', '2022-12-07 06:51:21', 1),
(3, 'siva', 'qqqqq', 'mgr', 'be', '9999999999', '888888888', '2022-12-01', '2022-12-23', '1', '1', 'Google', 'sdvdsv@vfvv.com', 'Male', 'Mauritius', '12', 'sivakumar', 'xc xc', 'cx xc', NULL, '1', '2022-12-07 06:52:47', 1),
(4, 'Namchhhhhhhiiii', 'aaaaa', 'atretr', 'ewety', '5645767567', '5675675675', '2022-12-01', '2022-12-01', '1', '1', 'Google', 'eyrtd@sytr.ghk', 'Male', 'Mauritius', '234324', 'treter', 'rtert ertet e', 'tertrt', NULL, '3', '2022-12-07 07:53:51', 0),
(5, 'mani', 'mani', 'sdsdsds', 'BE', '5555555555', '6666666666', '2022-12-02', '2022-12-15', '1', '2', 'Students Referral', 'mani@mani.com', 'Male', 'Dubai', 'fgbfb', 'namachi', 'fgbgffgbfgbfgb', 'gbfbfgb', NULL, '1', '2022-12-09 07:14:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_enroll`
--

CREATE TABLE `student_enroll` (
  `enrollId` int(11) NOT NULL,
  `StId` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `parent_name` varchar(50) DEFAULT NULL,
  `institution` varchar(150) NOT NULL,
  `qualification` varchar(150) NOT NULL,
  `student_mobile` varchar(10) DEFAULT NULL,
  `parent_mobile` int(10) NOT NULL,
  `enquiry_date` date NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(100) NOT NULL,
  `program` varchar(10) NOT NULL,
  `source` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `prefered_country` varchar(50) NOT NULL,
  `counsellor_id` varchar(20) NOT NULL,
  `counsellor_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `remarks` text NOT NULL,
  `centre` varchar(25) NOT NULL,
  `batch` int(5) NOT NULL,
  `promocode` varchar(25) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `Updated_DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_enroll`
--

INSERT INTO `student_enroll` (`enrollId`, `StId`, `name`, `parent_name`, `institution`, `qualification`, `student_mobile`, `parent_mobile`, `enquiry_date`, `dob`, `course`, `program`, `source`, `email`, `gender`, `prefered_country`, `counsellor_id`, `counsellor_name`, `address`, `remarks`, `centre`, `batch`, `promocode`, `photo`, `Updated_DateTime`, `status`) VALUES
(1, 5, 'mani', 'mani', 'sdsdsds', 'BE', '5555555555', 2147483647, '0000-00-00', '2022-12-15', '1', '2', 'Students Referral', 'mani@mani.com', 'Male', 'Dubai', 'fgbfb', 'namachi', 'fgbgffgbfgbfgb', 'gbfbfgb', '1', 5, 'IELTS001', 'HI', '2022-12-09 07:14:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_enrollbkp`
--

CREATE TABLE `student_enrollbkp` (
  `eId` int(10) NOT NULL,
  `enquiry_id` int(5) NOT NULL,
  `course_id` int(11) NOT NULL,
  `program_id` varchar(11) NOT NULL,
  `batch` int(2) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `promo_code` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `stuStatus` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `b_id` int(10) NOT NULL,
  `batch_name` varchar(30) NOT NULL,
  `program_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `timing` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`b_id`, `batch_name`, `program_id`, `emp_id`, `center_id`, `start_date`, `end_date`, `timing`, `days`, `status`) VALUES
(1, 'GRE1', 1, 1, 1, '2022-11-30', '2022-12-08', '100 Hours', 'Weekdays', 0),
(2, 'GMAT123', 2, 1, 1, '2022-11-30', '2022-12-31', '150 Hours', 'Week Ends', 0),
(3, 'Bq1', 2, 3, 1, '2022-12-01', '2022-12-29', '100 Hours', 'Week Ends', 0),
(4, 'cddd', 2, 1, 4, '2022-12-01', '2022-12-08', '100 Hours', 'Weekdays', 0),
(5, 'Namachi', 2, 4, 2, '2022-12-01', '2022-12-07', '200 Hours', 'Week Ends', 0),
(6, 'ILTES', 2, 5, 1, '2022-12-06', '2022-12-23', '100 Hours', 'Weekdays', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_center`
--

CREATE TABLE `tbl_center` (
  `cid` int(10) NOT NULL,
  `center` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_center`
--

INSERT INTO `tbl_center` (`cid`, `center`, `status`) VALUES
(1, 'KDM', 0),
(2, 'OMR', 0),
(3, 'All', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `c_id` int(4) NOT NULL,
  `course` varchar(30) CHARACTER SET latin1 NOT NULL,
  `program` varchar(50) CHARACTER SET latin1 NOT NULL,
  `duration` int(4) NOT NULL,
  `amount` int(11) NOT NULL,
  `center` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`c_id`, `course`, `program`, `duration`, `amount`, `center`, `status`) VALUES
(1, 'GRE', 'Online', 100, 1000000, 'KDM', 0),
(2, 'ILTES2023', 'Class Room', 150, 150000, 'ALL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `id` int(5) NOT NULL,
  `examCode` varchar(25) NOT NULL,
  `ques_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow_up`
--

CREATE TABLE `tbl_follow_up` (
  `fId` int(2) NOT NULL,
  `follow_up` varchar(15) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `pid` int(10) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`pid`, `program_name`, `status`) VALUES
(1, 'Online', '0'),
(2, 'Class Room', '0'),
(3, 'Self Prep', '0'),
(4, 'Institutional', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `proid` int(10) NOT NULL,
  `promo_name` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serial_no`
--

CREATE TABLE `tbl_serial_no` (
  `Id` int(11) NOT NULL,
  `SerialCode` varchar(10) NOT NULL,
  `prefix` varchar(11) NOT NULL,
  `suffix` varchar(11) NOT NULL,
  `SerialNumber` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `Updated_DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timings`
--

CREATE TABLE `tbl_timings` (
  `tid` int(10) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img_lib`
--
ALTER TABLE `img_lib`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img_name` (`img_name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `questionbank`
--
ALTER TABLE `questionbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionpapper`
--
ALTER TABLE `questionpapper`
  ADD PRIMARY KEY (`qpid`);

--
-- Indexes for table `question_paper_mapping`
--
ALTER TABLE `question_paper_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_papper_map`
--
ALTER TABLE `question_papper_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_result`
--
ALTER TABLE `question_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_class_map`
--
ALTER TABLE `staff_class_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_info`
--
ALTER TABLE `staff_info`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_enquiry`
--
ALTER TABLE `student_enquiry`
  ADD PRIMARY KEY (`StId`);

--
-- Indexes for table `student_enroll`
--
ALTER TABLE `student_enroll`
  ADD PRIMARY KEY (`enrollId`);

--
-- Indexes for table `student_enrollbkp`
--
ALTER TABLE `student_enrollbkp`
  ADD PRIMARY KEY (`eId`),
  ADD UNIQUE KEY `ADMISSION_ID` (`enquiry_id`),
  ADD KEY `batch` (`batch`);

--
-- Indexes for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_center`
--
ALTER TABLE `tbl_center`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ques_no` (`ques_no`);

--
-- Indexes for table `tbl_follow_up`
--
ALTER TABLE `tbl_follow_up`
  ADD PRIMARY KEY (`fId`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `tbl_serial_no`
--
ALTER TABLE `tbl_serial_no`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `SerialCode` (`SerialCode`);

--
-- Indexes for table `tbl_timings`
--
ALTER TABLE `tbl_timings`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img_lib`
--
ALTER TABLE `img_lib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questionbank`
--
ALTER TABLE `questionbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `questionpapper`
--
ALTER TABLE `questionpapper`
  MODIFY `qpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_paper_mapping`
--
ALTER TABLE `question_paper_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_papper_map`
--
ALTER TABLE `question_papper_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_result`
--
ALTER TABLE `question_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_class_map`
--
ALTER TABLE `staff_class_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_info`
--
ALTER TABLE `staff_info`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_enquiry`
--
ALTER TABLE `student_enquiry`
  MODIFY `StId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_enroll`
--
ALTER TABLE `student_enroll`
  MODIFY `enrollId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_enrollbkp`
--
ALTER TABLE `student_enrollbkp`
  MODIFY `eId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_batch`
--
ALTER TABLE `tbl_batch`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_center`
--
ALTER TABLE `tbl_center`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `c_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_follow_up`
--
ALTER TABLE `tbl_follow_up`
  MODIFY `fId` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `proid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_serial_no`
--
ALTER TABLE `tbl_serial_no`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_timings`
--
ALTER TABLE `tbl_timings`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_enrollbkp`
--
ALTER TABLE `student_enrollbkp`
  ADD CONSTRAINT `student_enrollbkp_ibfk_1` FOREIGN KEY (`batch`) REFERENCES `tbl_batch` (`b_id`);

--
-- Constraints for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD CONSTRAINT `tbl_exam_ibfk_1` FOREIGN KEY (`ques_no`) REFERENCES `questionbank` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
