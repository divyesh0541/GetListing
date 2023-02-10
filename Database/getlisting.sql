-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 05:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getlisting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'admin',
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `contact`, `password`, `user_type`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567890', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `announcement_title` varchar(200) NOT NULL,
  `announcement_description` varchar(900) NOT NULL,
  `announcement_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `listing_id`, `listing_name`, `member_email`, `announcement_title`, `announcement_description`, `announcement_date`, `status`) VALUES
(9, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 'Our new franchise in gujarat', 'We started our new franchise in gujarat surat so our travel agency is always help in new franchise and fully spports', '2021-03-28', 0),
(10, 106, 'Surat Ford', 'suratford1@gmail.com', 'Ford Luanched new car', 'Ford has luanched new car which is Echosport and in low cost', '2021-03-28', 0),
(11, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 'New Prices For Rooms', 'We Renovate our hotel so we will charge customer 2% more for rooms tomorrow onwards', '2021-03-28', 0),
(12, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'Regarding Hours Of Operation', 'We would like to inform you that sehgal doors will be closed on 30 june and we will not taken any order at that day', '2021-03-30', 0),
(13, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'International president added', 'McDonalds international president Ian Borden added during an investor presentation that the company plans to start McPlant with \"a delicious burger,\" and that it might add \"burgers, chicken-substitutes, and breakfast sandwiches,\" too.', '2021-03-30', 0),
(14, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 'Vacancy Announcement', 'Bombay hospital requires qualified candidates for the following posts : (1) Marketing Manager (2) Marketing Executive', '2021-03-30', 0),
(15, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 'College Sports and Covid 19', 'We declare that the sports activity should not conducted this year because of the covid 19', '2021-03-30', 0),
(16, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 'College Sports and Covid 19', 'We declare that the sports activity should not conducted this year because of the covid 19', '2021-03-30', 0),
(17, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 'New Franchise', 'We would like to announce that our new franchise will be start from 10 june', '2021-03-30', 0),
(18, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 'New Cake Announcement', 'We would like to inform you about our new cake which is choko lava cake and we will be start selling it from june 23', '2021-03-30', 0),
(19, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 'Shop on Inernet', 'We Proude to announce that our products will be start selling from our new e commerce website from 10 july', '2021-03-30', 0),
(20, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 'Declaration of holiday', 'We inform you that our travel agency will be closed from 23 june to 9 july', '2021-03-30', 0),
(21, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 'Vacancy about traniers', 'We will start the training of animation for the students so we requires some eligible candidate for that post, candidate can come for interview between 2 pm to 5 pm', '2021-03-30', 0),
(22, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 'Free Coaching for law', 'We inform you that we will provide free coaching for law students can come for know the details about it', '2021-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `appointment_reason` varchar(900) NOT NULL,
  `appointment_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `listing_id`, `listing_name`, `member_email`, `user_name`, `user_email`, `user_contact`, `appointment_reason`, `appointment_date`, `status`) VALUES
(10, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'chirag', 'sales@sehgaldoors.com', '9046767230', 'I have to confirm my appointment becuase i want to know about how the macdonald franchise would taken', '2021-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `blog_title` varchar(500) NOT NULL,
  `blog_description` varchar(900) NOT NULL,
  `blog_date` date NOT NULL,
  `blog_image` varchar(300) NOT NULL,
  `blog_number` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `listing_id`, `member_email`, `blog_title`, `blog_description`, `blog_date`, `blog_image`, `blog_number`, `status`) VALUES
(28, 102, 'tapidiploma@gmail.com', 'Coolest Work-Study Jobs on Campus', 'I have to give a shout-out to GTU University for this idea. To many students, work-study jobs are a necessary part of campus life. I love the concept of taking something that isn’t traditionally a selling point and making it one. Well done, Tapi College.', '2021-03-28', '650-2021-02-10.jpg', 0, 1),
(29, 102, 'tapidiploma@gmail.com', 'Stories About Student Organizations', 'Tapi students want to get involved on campus. Showcase the different organizations they can join, and document the exciting things those organizations are accomplishing.', '2021-03-28', '377-Stories_About_Student_Organizations.jpg', 0, 1),
(30, 102, 'tapidiploma@gmail.com', 'Experience of Studying Abroad', 'Did you know that fewer than 10% of all U.S. undergrad students study abroad? I guarantee you more than 10% of incoming U.S. undergrad students plan to study abroad. Cater to the latter group.', '2021-03-28', '992-01c09056662e381da715891d48fc18c5.jpg', 0, 1),
(31, 103, 'info@kiranhospital.com', 'How to prevent Cancer from coming back', 'Eat a healthy diet. Major portion of your diet should be from plant sources, including vegetables, fruits, dry fruits etc. Avoid or limit consumption of meat, fried products and processed foods.\r\n\r\nAvoid or limit alcohol intake.\r\n\r\nHave positive thoughts. Do yoga, meditation, affirmative writing and join cancer support groups to cultivate the right thoughts. ', '2021-03-28', '618-white_awareness_ribbon_two_hands_with_stethoscope_pink_background_7fa4259035.jpg', 0, 1),
(32, 103, 'info@kiranhospital.com', 'Make Chemotherapy Easy on Yourself!', 'A cancer diagnosis can shatter the life of the patient, their family, and friends. The reports confirming cancer can be devastating and leave people in turmoil. Cancer is one of the foremost leading causes of untimely deaths, and a diagnosis can bring absolute fear among the patient and their near ones.', '2021-03-28', '868-thumbnail_4d675bd375.png', 0, 1),
(33, 103, 'info@kiranhospital.com', 'Stop Loose Motions With These 3 Simple Homemade Cures', 'Loose motions or Diarrhea is one of the most common ailments across every age group – from infants and mothers to the elderly. Diarrhea is the frequent passage of watery or loose stools across irregular intervals. There are many possible causes of Diarrhea. These include allergies, food poisoning, infections, and stress.  As such, Diarrhea is merely a symptom of one of many possible causes. Most of the time, loose motions is not a serious problem and can be treated at home.  Below, we’ve outlined 3 simple homemade cures that can help you overcome your loose motions without seeing a doctor.', '2021-03-28', '931-thumbnail_50df7dfd89.png', 0, 1),
(34, 104, 'guestcaredominos@jublfood.com', 'Taste the creaminess of white sauce pasta in every bite', 'Imagine its a fine sunday afternoon. All you feel like doing is unwind on your couch, put on some good music and have your much deserved ‘me time’. You realise that having a good time doesn’t necessarily have to be a costly affair and you decide to treat yourself to some creamy deliciousness from Domino because you deserve every bit of happiness.', '2021-03-28', '172-046115-white-pasta-veg-1346597403.jpg', 0, 1),
(35, 104, 'guestcaredominos@jublfood.com', 'What makes Dominos Pasta different?', 'The chefs at Dominos have curated the range of Veg/Non-Veg range of Pasta keeping in mind the flavours of the Indian palette. While people have relished the Indian style pasta over the years, we are giving your much-loved pasta a refreshing taste in three different sauces- Tikka Masala Sauce, Morrocan Spice, and Creamy Tomato.', '2021-03-28', '897-CreamyTomatoVeg_N.jpg', 0, 1),
(36, 105, 'tours@allindiatours.com', 'Best Travel Places For Bachelors', 'Ladakh - Every biker dreams of a Ladakh bike trip. The challenging mountains and passes open up to the most beautiful views besides being one of the greatest adventures of one in life. You can make memories with your friend on this Ladakh bike trip,  Enjoy the ultimate thrill of driving on through the mountains. You can enjoy the thrills of beautiful places like Manali, Jispa, Sarchu, Leh, Nubra Valley, Pangong Lake, and Khardung La with Ladakh trip. Besides, enjoy shopping at Leh bazaars, visit monasteries like Thiksey and Shey, visit Buddhist Shanti Stupa and more with the adventure-filled Ladakh bike tour. Many travel agents were arranging the bike tour on Ladakh. You need to keep a photo id and visa for the trip.', '2021-03-28', '429-Bike-Ladakh.jpg', 0, 1),
(37, 105, 'tours@allindiatours.com', 'Haunted Islands You Would Never Want To Visit.', 'When islands are the topic, most people visualize sunny places of unchanged, original natural beauty where you can stay on the beach all day, relax and do nothing. But not all islands are a slice of heaven. There are some islands on our planet that fascinate travelers, not with their sunny beaches but with dark curiosity. From abandoned prisons and asylums to nests of supernatural activities, here are the creepiest haunted islands around the world.', '2021-03-28', '243-Cover.jpg', 0, 1),
(38, 105, 'tours@allindiatours.com', 'Mysterious temples in south india', 'As soon as you step into the temple premise, it will start tracing an impact of its enriched cultural and ancient engineering marvel. It is a true splendid creation which compelled me to think about the master skill posed by the engineers, architects and whoever else were involved in creating this masterpiece.The whole Lepakshi temple is made of stones depicting our never vanishing traditional and cultural integrity. Various deity of God and Goddess have been carved out on the walls and pillars of the temple. You can see various sculptures all around in the temple, all made of stone and some are crafted on walls and pillars. Another attraction is roof painting speared all over on the roof of temple depicting glorious ancient Indian culture and traditions.', '2021-03-28', '911-Coverxhdxfg.jpg', 0, 1),
(39, 106, 'suratford1@gmail.com', 'Why you should pay more attention to a car ground clearance', '‘Ground clearance’ is a term thats heard often when you research cars. It is one of the most important things buyers consider when making a purchase. Let us take a closer look at why ground clearance is so important.', '2021-03-28', '102-1-4-500x333.jpg', 0, 1),
(40, 107, 'hotelarkofavalon@gmail.com', 'How to Start a Hotel Business', 'For many people, starting their own boutique hotel or luxury bed and breakfast is like a dream. Most are drawn by the charm of hospitality and see it as a chance to start a new beginning. But opening a hotel business , just like any new company, is more difficult than it might seem at first sight.', '2021-03-30', '810-mara-conan-design-O_6dZUyxezo-unsplash-scaled-1170x789.jpg', 0, 1),
(41, 108, 'sales@sehgaldoors.com', 'Making door using dowel pin', 'About 10 years ago we started (Bangladesh) started importing panel door from overseas, look great, the thickness is 36 mm, polishing is beautiful, was selling like a hot cake at the price of $300.00/ door.\r\nNow after 10 years, they are trying to sell the same door for $75.00, but few people are buying it by mistake. The market of the foreign door is going down every day due to their lack of knowledge in the door structural engineering, or the machine manufacturers are not aware of that.', '2021-03-30', '874-using-of-dowel-pin-in-door.png', 0, 1),
(42, 109, 'macdonald@gmail.com', '5 reasons to order right now from McDonalds', '(1) Safeguard of Golden Guarantee (2) Fresh food always (3)Touch me not (4) Contactless Delivery (5)Prefer to take a drive instead?', '2021-03-30', '708-4reasons_burger.jpeg', 0, 1),
(43, 110, 'bombayhospital@gmail.com', 'Bombay Hospital brings the latest TomoTherapy for Treatment of Cancer Patients', 'The Department of Radiation Oncology at Max Institute of Cancer Care (MICC), Vaishali, brings a significantly advanced, next generation TomoTherapy for treatment of cancer patients. This groundbreaking, cutting-edge technique destroys or reduces tumours by combining the precision of intensity-modulated radiation therapy and image guided scan.', '2021-03-30', '147-IMG_20210322_WA_0033_7fd739e730.jpg', 0, 1),
(44, 111, 'admin@ssasit.ac.in', 'Career Advise', 'A careers and skills advice blog for undergraduates and graduates. Provides great tips and useful information on job applications and interview techniques as well as on how to make good career decisions while still studying. This blog is perfect for career advice and more!', '2021-03-30', '614-Advice.jpg', 0, 1),
(45, 112, 'office@bcp.edu.in', 'Small Business Development Center', 'A community college blog which focuses on business and industry. Includes, among many other topics, articles on forecasting, marketing, project management, small business, and legal issues. An additional selection of international business and inventions and patents articles completes this well-rounded blog.', '2021-03-30', '806-SBDC.png', 0, 1),
(47, 115, 'newkhalsabakery@yahoo.com', 'Speckled Egg Cake', 'It might not feel like it, with cold air and snow still hanging around, but Spring is just around the corner.  Before you know it, the first buds of green will be popping up on tree branches.  Birds will be chirping.  Flowers will be blooming.  And Easter will be on the way!  So today were getting ready with a new cake tutorial that is all about Spring!  Inspired by the gorgeous color and texture of robins eggs, this cake is super easy and incredibly fun.', '2021-03-30', '516-speckled-easter-egg-cake-thumb-sm-600x897.jpg', 0, 1),
(48, 116, 'sahnisales@gmail.com', 'Analog DC/DC Converters in the Sixteenth brick format for Telecoms applications', 'Flex Power Modules introduces the PKU4913D, the latest variant in its PKU-D series of analog DC/DC converters in the sixteenth brick format. The new converter delivers excellent electrical and thermal performance at an affordable cost.', '2021-03-30', '595-Converters-for-Telecoms-applications-300x232.png', 0, 1),
(49, 117, 'shangardecorltd@hotmail.com', 'Wedding Planners & Decorators Reveal: Decor Trends That Will Take 2021 By A Storm!', 'As the year changes, the tide of the pandemic and the so-called new normal is also shifting. And thus, weddings, in general, have begun evolving. Now, were well enough into 2021 to understand all the things that may be changing in terms of wedding trends. One of those things is wedding decor trends. ', '2021-03-30', '477-page.jpg', 0, 1),
(50, 118, 'dg-spipa@gujarat.gov.in', 'How to prepare economics for UPSC prelims 2021', '(1) Start with NCERTs of IX and proceed forward (2) Then cover the basic books and get strong in the basic concepts and details. (3) To supplement the study, one can look-out for the NIOS website. (4) The Hindu Newspaper/ Economic Times/ Business Standard for current affairs related to economy (5) Yearly magazine of choice', '2021-03-30', '275-IAS-Indian-Administrative-Services-1.png', 0, 1),
(51, 119, 'silverlifegym4@gmail.com', 'Effective Fitness Requires An Intuitive Mindset', 'The game rules are pretty simple; you have to show up and put in your time. Another level of discipline and strength that perfectionists are in pursuit of is called true strength. Danny and Al describe true strength beyond the physical. This statement doesnt intend to discredit the people whose goal is to look good or do the bare minimum to be healthy.', '2021-03-30', '704-thekavadlobrothers.jpeg', 0, 1),
(52, 120, 'karthikeyatravels@gmail.com', 'WHY YOU SHOULD START BOOKING YOUR FUTURE TRIPS NOW', 'If youre like me, youve been waiting over a year for this moment. That light at the end of the tunnel — where we are mostly vaccinated and can hug strangers, go to concerts and crowded bars, and travel the world again.', '2021-03-30', '821-whentobook2.jpg', 0, 1),
(53, 121, 'info@brihaspathi.com', 'One Username, One Password Is All It Takes for Your Security to Come Crashing Down', 'Hackers first executed their plan by gaining access to a “Super Admin” account of Verkada, a company that sells security cameras that are managed through a web based program. Their methods of hacking were not advanced and it was reported that they simply found an admin username and password “publicly exposed” on the internet. Once they had the administrative account information, they were able to access deeper into the network, with ease.', '2021-03-30', '77-Yellow and White Photo Marketing Proposal Presentation-14.png', 0, 1),
(54, 122, 'gmrao@gmail.com', 'Bail In India', 'The Constitution of India states that bail is the right of a person i.e. Bail and not Jail. This clearly states that the person, who is accused and charged for any civil or criminal offenses, has the right to apply for the bail. However, there is an exception to this rule, like the criminal is repetitive offender in such matters. Also, if it is considered that he or she can fly away easily after the grant of the bail. It is also considered if he or she can tamper the proofs or intimidate the witness in the case.', '2021-03-30', '16-Bail-Types-in-India-Adv-Bindu-Dubey.png', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deals_offers`
--

CREATE TABLE `deals_offers` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `deals_title` varchar(200) NOT NULL,
  `deals_description` varchar(900) NOT NULL,
  `deals_offers_t_and_c` varchar(900) NOT NULL,
  `deals_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deals_offers`
--

INSERT INTO `deals_offers` (`id`, `listing_id`, `listing_name`, `member_email`, `deals_title`, `deals_description`, `deals_offers_t_and_c`, `deals_date`, `status`) VALUES
(8, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 'Travel between 23 jan to 9 feb', 'For Traveling between 23 jan to 9 feb , you can get the 50 % off', '1.Deals can valid upto 1 month', '2021-03-28', 0),
(9, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', '20% Off for 2 day stay in our hotel', 'if customer is stay in 2 or more day than we will give 20% off', '1.Must stay 2 days\r\n2.Valid upto 10 days', '2021-03-28', 0),
(10, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', ' On Godrej Elc Zinc Alloy Door Handle With Body Mortise Lock At Special Sale', 'Avail 25% Off On Godrej Elc Zinc Alloy Door Handle With Body Mortise Lock At Special Sale', '(1) Offers will be availabel only for 3 months', '2021-03-30', 0),
(11, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'Get 20% Cashback', 'Get 20% Cashback upto 50 rupees on your first order', '(1) Valid for first order (2) upto 50 rupees order', '2021-03-30', 0),
(12, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 'Free Student Environment conservation camp', 'Free student camp for free at sashit college in which we discuss about environment and other activity', '(1) Camp is for just 3 week (2) Valid from 2 july to 15 july', '2021-03-30', 0),
(13, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 'Get 60% off', 'Hair cut and Hair wash in just 199 rupees for mens only', '(1) For mens only (2) Avail for 2 month(jan and feb)', '2021-03-30', 0),
(14, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 'Buy one get one free', 'Get the 2 cakes in one cake price', '(1) Avail offer for chrismas', '2021-03-30', 0),
(15, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 'Get 25% off on tv', 'Get the 25% off of tv which price is more than 45000', '(1) Buy at least 45000 tv (2) Avail offer for 4 days(4 jan to 7 jan)', '2021-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `faq_question` varchar(200) NOT NULL,
  `listing_faq_answer` varchar(300) NOT NULL,
  `listing_faq_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `listing_id`, `listing_name`, `member_email`, `faq_question`, `listing_faq_answer`, `listing_faq_date`, `status`) VALUES
(10, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 'Whats is the annual course fee?', 'The annual course fee is about 39000', '2021-03-28', 0),
(11, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 'Is tapi college is goverment college?', 'No,Tapi College is a private college', '2021-03-28', 0),
(12, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 'When was the tapi college established', 'Tapi College was established in the year 2002', '2021-03-28', 0),
(13, 103, 'Kiran Hospital', 'info@kiranhospital.com', 'What is the charges for PET CT Scan? How much waiting is there for it?', 'The charges for PET CT Scan is 17k', '2021-03-28', 0),
(14, 103, 'Kiran Hospital', 'info@kiranhospital.com', 'Is there Eye check up availabel for kids', 'Yes', '2021-03-28', 0),
(15, 103, 'Kiran Hospital', 'info@kiranhospital.com', 'Is there any dental services available and at what rates?', 'There is a large dental department. Rates are reasonable.', '2021-03-28', 0),
(16, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 'Is there an expiry time for the OTP generated?', 'No. OTP can be used only once, but there is no set expiry time for OTPs.', '2021-03-28', 0),
(17, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 'Is customer charged for SMS?', 'Yes', '2021-03-28', 0),
(18, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 'How do I cancel my Dominos Gift Card purchase?', 'he purchase of Dominos Gift card cannot be cancelled after placing the order.', '2021-03-28', 0),
(19, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 'Coast for general journey', 'About 1000 Rupees', '2021-03-28', 0),
(20, 106, 'Surat Ford', 'suratford1@gmail.com', 'Where can I find a list of Authorised Ford Dealers?', 'Please visit the Dealer Locator on the Ford website or call our toll free numbers 1800 419 2500 | 1800 425 2500 and we can automatically transfer you to a Dealer based on your postcode.', '2021-03-28', 0),
(21, 106, 'Surat Ford', 'suratford1@gmail.com', 'I need to discuss my sales contract. Who can I call?', 'A Sales Contract, or purchase negotiation, is a legally binding document between a customer and an authorised Ford Dealership. If further assistance is required, the Dealership Sales Manager or Dealer Principal will be pleased to help. To contact your Ford Dealer please click here.', '2021-03-28', 0),
(22, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 'Is this property couple friendly?', 'yes sir, Hotel Ark Of Avalon is couple friendly, Also we accept local IDs', '2021-03-30', 0),
(23, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 'which are paper are required for stay your hotel', 'Dear Sir, We accept Delhi Id like DL, Aadhar Card, Voter Id Card, Passoport . A copy of these valid Id required at the time of check in at hotel. We take a copy of your Id.', '2021-03-30', 0),
(24, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'When are fire doors required?', 'Basically wherever a fire might start, it is advisable to use a fire door. For example, doors leading from: a kitchen; a lounge with a fireplace & TV; or any room with electrical equipment or flammable items.', '2021-03-30', 0),
(25, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'Do I need seals?', 'Yes, combined heat and smoke seals are designed to stop the spread of smoke and fire and to form a seal between your fire door and frame in a fire situation. As smoke is the leading cause of death in case of a fire the seals are an absolute must.', '2021-03-30', 0),
(26, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'What food safety procedures do you have in place in your restaurants?', 'We conduct at least 72 safety checks and procedures in our restaurants. eg. we use different coloured gloves when handling raw and cooked foods and take temperatures of products and equipment at least twice a day.', '2021-03-30', 0),
(27, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'What type of oil do you use for frying?', 'We began to use Canola Blend oil to fry our products in our Singapore restaurants in October 2014.', '2021-03-30', 0),
(28, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'What kind of meat do you use in your McChicken', 'We use a blend of white and dark meat in McChicken. 100% white meat is used in our Chicken McNuggets.', '2021-03-30', 0),
(29, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Cheques.', '2021-03-30', 0),
(30, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', ' Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Near Charkop Markets', '2021-03-30', 0),
(31, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 'What are the timing for students', 'From 10:00 to 5:30', '2021-03-30', 0),
(32, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 'Is there college conduct any sports activity', 'Yes,college conduct sports activity', '2021-03-30', 0),
(33, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 'What is the NIRF ranking for BCP , Kalyan ?', 'he NIRF Ranking for BCP , Kalyan are as follows :\r\nIn 2018 for Pharmacy : 8', '2021-03-30', 0),
(34, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 'Is BCP , Kalyan a government college?', 'BCP , Kalyan is Private college.', '2021-03-30', 0),
(35, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 'When was the college , BCP , Kalyan established ?', 'BCP , Kalyan was established in the year 1957.', '2021-03-30', 0),
(36, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 'What if I dont know what haircut looks best on me?', 'Our highly educated stylists offer a thorough consultation to help give you the cut and style you are looking for. They will take into consideration your facial features, styling needs and daily routine to give you the best look for your lifestyle. Our stylists will be happy to assist you with choos', '2021-03-30', 0),
(37, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 'How long should the hair be on my body before a wax?', 'The ideal length for hair is about 1/4 of an inch (the size of a grain of rice). You want it long enough for the wax to hold on to, but not so long as to make it painful.', '2021-03-30', 0),
(38, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 'How often should I get facials?', 'To maintain optimum nourishment of your skin, we recommend having a facial every 4-6 weeks. If you are looking to correct an issue such as blemishes, your esthetician will be happy to assist you in choosing a regimen that will work best for your specific skin type and issue.', '2021-03-30', 0),
(39, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 'Which are the different cuisines served at the establishment?', 'The establishment serves cuisines like Desserts.', '2021-03-30', 0),
(40, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 'Does the establishment provide home delivery service?', 'Yes, you can avail home delivery service from the establishment. However, do confirm if the service is free or paid.', '2021-03-30', 0),
(41, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Debit Cards, Credit Card.', '2021-03-30', 0),
(42, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 'Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Model Town Main Market', '2021-03-30', 0),
(43, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Debit Cards, Cheques, American Express Card, Credit Card.', '2021-03-30', 0),
(44, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 'Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Opposite Safal Square', '2021-03-30', 0),
(45, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Cheque, UPI, BHIM, Paytm, G Pay, NEFT, RTGS, IMPS, Cash on Delivery.', '2021-03-30', 0),
(46, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 'Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Near Ramesh Pavbhaji', '2021-03-30', 0),
(47, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 'What is the educational qualification needed to appear in IAS exam?', 'Any degree (graduation) which may be regular or distant. The candidate must hold a degree from any of Universities incorporated by an Act of the Central or State Legislature in India or other educational institutions established by an Act of Parliament or declared to be deemed as a University Under ', '2021-03-30', 0),
(48, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 'Can final year students of graduation apply for UPSC CSE?', 'Yes, candidates who have appeared at an examination the passing of which would render them educationally qualified for the Commissions examination but have not been informed of the results as also the candidates who intend to appear at such a qualifying examination will also be eligible for admissio', '2021-03-30', 0),
(49, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 'If I apply for the Civil Services Prelims Exam but do not appear in any paper will it be counted as an attempt?', 'No, an attempt will be counted only if you have appeared in at least one paper.', '2021-03-30', 0),
(50, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Cheque, Debit Card, Credit Card, Amex Card, UPI, BHIM, G Pay, IMPS, RTGS, NEFT.', '2021-03-30', 0),
(51, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 'Do they offer parking facility ?', 'Yes free Parking is available at the establishment.', '2021-03-30', 0),
(52, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 'Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Near Shyam Mandir, Above CCD', '2021-03-30', 0),
(53, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Cheques.', '2021-03-30', 0),
(54, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 'Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Opposite Rajhans Zion, Near G.D. Goenka School', '2021-03-30', 0),
(55, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Cheque, UPI, BHIM, Paytm, G Pay, PhonePe, NEFT, RTGS, IMPS.', '2021-03-30', 0),
(56, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 'Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Near Savji Korat Bridge', '2021-03-30', 0),
(57, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 'What are the various mode of payment accepted here ?', 'You can make payment Via Cash, Master Card, Visa Card, Debit Cards, Cheques, American Express Card, Credit Card.', '2021-03-30', 0),
(58, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 'Which is the nearest landmark ?', 'You can easily locate the establishment as it is in close proximity to Opposite Paradise Takeaway, Beside Orange Honda Showroom', '2021-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `favourite` int(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `listing_id`, `listing_name`, `member_email`, `favourite`, `user_email`, `user_name`, `status`) VALUES
(18, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(19, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(20, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(21, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(22, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(23, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(24, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(25, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(26, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(27, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(28, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(29, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(30, 106, 'Surat Ford', 'suratford1@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(31, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(32, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(33, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 1, 'gmrao@gmail.com', 'G M Rao', 0),
(34, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(35, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(36, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(37, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(38, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(39, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(40, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(41, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 1, 'tapidiploma@gmail.com', 'divyesh', 0),
(42, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(43, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(44, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'info@kiranhospital.com', 'amish', 0),
(45, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(46, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(47, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'info@kiranhospital.com', 'amish', 0),
(48, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(49, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'info@kiranhospital.com', 'amish', 0),
(50, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(51, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(52, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(53, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 1, 'info@kiranhospital.com', 'amish', 0),
(54, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'info@kiranhospital.com', 'amish', 0),
(55, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(56, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(57, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(58, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(59, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(60, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(61, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(62, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(63, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(64, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(65, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(66, 106, 'Surat Ford', 'suratford1@gmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(67, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(68, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(69, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(70, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 1, 'guestcaredominos@jublfood.com', 'alish', 0),
(71, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'tours@allindiatours.com', 'vraj', 0),
(72, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'tours@allindiatours.com', 'vraj', 0),
(73, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'tours@allindiatours.com', 'vraj', 0),
(74, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(75, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(76, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(77, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(78, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'suratford1@gmail.com', 'jaimish', 0),
(79, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(80, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 1, 'suratford1@gmail.com', 'jaimish', 0),
(81, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(82, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(83, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(84, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(85, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 1, 'suratford1@gmail.com', 'jaimish', 0),
(86, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(87, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(88, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(89, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(90, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(91, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(92, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(93, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(94, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(95, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(96, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 1, 'hotelarkofavalon@gmail.com', 'prajay', 0),
(97, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(98, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(99, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(100, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(101, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(102, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(103, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(104, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(105, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(106, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(107, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(108, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 1, 'sales@sehgaldoors.com', 'chirag', 0),
(109, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'macdonald@gmail.com', 'prath', 0),
(110, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'macdonald@gmail.com', 'prath', 0),
(111, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'macdonald@gmail.com', 'prath', 0),
(112, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'macdonald@gmail.com', 'prath', 0),
(113, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 1, 'macdonald@gmail.com', 'prath', 0),
(114, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 1, 'macdonald@gmail.com', 'prath', 0),
(115, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'macdonald@gmail.com', 'prath', 0),
(116, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 1, 'macdonald@gmail.com', 'prath', 0),
(117, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'macdonald@gmail.com', 'prath', 0),
(118, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'macdonald@gmail.com', 'prath', 0),
(119, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(120, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(121, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(122, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(123, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(124, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(125, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(126, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(127, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(128, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(129, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 1, 'bombayhospital@gmail.com', 'ajay', 0),
(130, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(131, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(132, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(133, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(134, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(135, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(136, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(137, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(138, 106, 'Surat Ford', 'suratford1@gmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(139, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(140, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(141, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(142, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(143, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(144, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(145, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 1, 'admin@ssasit.ac.in', 'rohan', 0),
(146, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'office@bcp.edu.in', 'akash', 0),
(147, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 1, 'office@bcp.edu.in', 'akash', 0),
(148, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'office@bcp.edu.in', 'akash', 0),
(149, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'office@bcp.edu.in', 'akash', 0),
(150, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'office@bcp.edu.in', 'akash', 0),
(151, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'office@bcp.edu.in', 'akash', 0),
(152, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 1, 'office@bcp.edu.in', 'akash', 0),
(153, 106, 'Surat Ford', 'suratford1@gmail.com', 1, 'office@bcp.edu.in', 'akash', 0),
(154, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 1, 'office@bcp.edu.in', 'akash', 0),
(155, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 1, 'office@bcp.edu.in', 'akash', 0),
(156, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'office@bcp.edu.in', 'akash', 0),
(157, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'studio11@gmail.com', 'mayank', 0),
(158, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'studio11@gmail.com', 'mayank', 0),
(159, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 1, 'studio11@gmail.com', 'mayank', 0),
(160, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'studio11@gmail.com', 'mayank', 0),
(161, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 1, 'studio11@gmail.com', 'mayank', 0),
(162, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'studio11@gmail.com', 'mayank', 0),
(163, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'studio11@gmail.com', 'mayank', 0),
(164, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'newkhalsabakery@yahoo.com', 'harsh', 0),
(165, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'newkhalsabakery@yahoo.com', 'harsh', 0),
(166, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 1, 'newkhalsabakery@yahoo.com', 'harsh', 0),
(167, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 1, 'newkhalsabakery@yahoo.com', 'harsh', 0),
(168, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 1, 'newkhalsabakery@yahoo.com', 'harsh', 0),
(169, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 1, 'newkhalsabakery@yahoo.com', 'harsh', 0),
(170, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 1, 'sahnisales@gmail.com', 'rahul', 0),
(171, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'sahnisales@gmail.com', 'rahul', 0),
(172, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'sahnisales@gmail.com', 'rahul', 0),
(173, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 1, 'sahnisales@gmail.com', 'rahul', 0),
(174, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 1, 'sahnisales@gmail.com', 'rahul', 0),
(175, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 1, 'ganshyamcake@gmail.com', 'Siddharth', 0),
(176, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 1, 'ganshyamcake@gmail.com', 'Siddharth', 0),
(177, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 1, 'ganshyamcake@gmail.com', 'Siddharth', 0),
(178, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 1, 'ganshyamcake@gmail.com', 'Siddharth', 0),
(179, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 1, 'ganshyamcake@gmail.com', 'Siddharth', 0),
(180, 103, 'Kiran Hospital', 'info@kiranhospital.com', 1, 'ganshyamcake@gmail.com', 'Siddharth', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_feedback` varchar(900) NOT NULL,
  `feedback_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `user_name`, `user_email`, `user_contact`, `user_feedback`, `feedback_date`, `status`) VALUES
(11, 33, 'Divyesh Rathod', 'tapidiploma@gmail.com', '8320072230', 'Best listing website ever , i had tried my listing display using this website, and very usefull website for business marketing', '2021-03-30', 0),
(12, 35, 'Alish Tadhani', 'guestcaredominos@jublfood.com', '8929623865', 'You guys do amazing work. i could not be happier with your professionalism and how quickly you get things done when requested. I would highly recommend others to use Getlisting for their Business', '2021-03-30', 0),
(13, 37, 'Jaimish Lakhani', 'suratford1@gmail.com', '9045678903', 'Best work getlisting, Keep doing', '2021-03-30', 0),
(14, 38, 'Prajay Nayak', 'hotelarkofavalon@gmail.com', '7947225053', 'They provide great service and value to business owners. Website was up and running in a timely manner, responds quick to problems and gets them done quickly', '2021-03-30', 0),
(15, 39, 'Chirag vadhvana', 'sales@sehgaldoors.com', '9046767230', 'Outstanding service and quality', '2021-03-30', 0),
(16, 40, 'Parth', 'macdonald@gmail.com', '9873162936', 'I have had all the help I needed with a quick response When I had questions.', '2021-03-30', 0),
(17, 41, 'Ajay', 'bombayhospital@gmail.com', '8956389570', 'Great Team, very professional! Thank you for all your AAA+ support.', '2021-03-30', 0),
(18, 42, 'Rohan Makwana', 'admin@ssasit.ac.in', '9065893345', 'This is one of the BEST companies. They work hard for their clients, providing us with excellence service seeing that our business is in great shape. We made the best choice going with them. Thanks for all you do.', '2021-03-30', 0),
(19, 43, 'Akash', 'office@bcp.edu.in', '9046909045', 'Getlisting is awesome! Awesome customer service.', '2021-03-30', 0),
(20, 48, 'Mayank Markande', 'studio11@gmail.com', '9959995370', 'We are so glad to be using Getlisting for our business website. Everyone has been wonderfully helpful and friendly. We are getting great results!', '2021-03-30', 0),
(21, 49, 'Harsh Rathod', 'newkhalsabakery@yahoo.com', '9814663862', 'Excellent company to work with excellent results, staff and web building knowledge. If you have any doubts, seek some of their customers and see what a great experience each one of them had and continue to have.', '2021-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `listing_location` varchar(200) NOT NULL,
  `listing_email` varchar(50) NOT NULL,
  `listing_member_name` varchar(100) NOT NULL,
  `listing_category` varchar(300) NOT NULL,
  `listing_tagline` varchar(1000) NOT NULL,
  `listing_city` varchar(100) NOT NULL,
  `listing_hour_open` varchar(900) NOT NULL,
  `listing_hour_close` varchar(900) NOT NULL,
  `listing_description` varchar(400) NOT NULL,
  `listing_contact` varchar(10) NOT NULL,
  `listing_telephone` varchar(50) NOT NULL,
  `listing_image1` varchar(100) NOT NULL,
  `listing_image2` varchar(200) NOT NULL,
  `listing_image3` varchar(200) NOT NULL,
  `listing_video_url` varchar(100) NOT NULL,
  `listing_website_url` varchar(100) NOT NULL,
  `listing_date` date NOT NULL,
  `listing_facebook_url` varchar(100) NOT NULL,
  `listing_instagram_url` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `listing_favourite` int(10) NOT NULL DEFAULT 0,
  `views` int(10) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `listing_latitude` varchar(500) NOT NULL,
  `listing_longitude` varchar(500) NOT NULL,
  `date_expire` date NOT NULL,
  `active_deactive` varchar(20) NOT NULL DEFAULT 'deactive',
  `avg_rating` int(10) NOT NULL,
  `listing_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `package` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `pur_date` date NOT NULL,
  `exp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `member_id`, `member_email`, `member_name`, `amount`, `package`, `status`, `pur_date`, `exp_date`) VALUES
(14, 36, 'tours@allindiatours.com', 'vraj', 3999, 'standard', 0, '2022-03-24', '2023-03-24'),
(15, 37, 'suratford1@gmail.com', 'jaimish', 3999, 'standard', 0, '2021-03-24', '2022-03-24'),
(16, 38, 'hotelarkofavalon@gmail.com', 'prajay', 3999, 'standard', 0, '2021-03-24', '2022-03-24'),
(17, 39, 'sales@sehgaldoors.com', 'chirag', 7999, 'premium', 0, '2021-03-24', '2022-03-24'),
(18, 40, 'macdonald@gmail.com', 'prath', 7999, 'premium', 0, '2021-03-24', '2022-03-24'),
(19, 41, 'bombayhospital@gmail.com', 'ajay', 7999, 'premium', 0, '2021-03-24', '2022-03-24'),
(20, 42, 'admin@ssasit.ac.in', 'rohan', 7999, 'premium', 0, '2021-03-24', '2022-03-24'),
(21, 43, 'office@bcp.edu.in', 'akash', 7999, 'premium', 0, '2021-03-24', '2022-03-24'),
(23, 48, 'studio11@gmail.com', 'mayank', 3999, 'standard', 0, '2021-03-26', '2022-03-26'),
(24, 49, 'newkhalsabakery@yahoo.com', 'harsh', 3999, 'standard', 0, '2021-03-26', '2022-03-26'),
(25, 50, 'sahnisales@gmail.com', 'rahul', 3999, 'standard', 0, '2021-03-26', '2022-03-26'),
(26, 54, 'karthikeyatravels@gmail.com', 'Niketan', 7999, 'premium', 0, '2021-03-27', '2022-03-27'),
(27, 55, 'info@brihaspathi.com', 'Vaibhav', 7999, 'premium', 0, '2021-03-27', '2022-03-27'),
(28, 56, 'gmrao@gmail.com', 'G M Rao', 7999, 'premium', 0, '2021-03-27', '2022-03-27'),
(29, 58, 'ganshyamcake@gmail.com', 'Siddharth', 3999, 'standard', 0, '2021-04-04', '2022-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(900) NOT NULL,
  `product_url` varchar(200) NOT NULL,
  `product_date` date NOT NULL,
  `product_image` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `listing_id`, `listing_name`, `member_email`, `product_name`, `product_description`, `product_url`, `product_date`, `product_image`, `status`) VALUES
(6, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'Fire Door with lamination', 'We bring our one of the most latest Designed Doors specially manufactured keeping in mind the safety, security with utmost beauty & grace for Hotels, Resorts, Banquet, Multiplex and so on. Whereas Wooden Doors have a life of 10 years these Doors guarantee approx 30 years life with low maintenance cost. ', 'https://www.indiamart.com/sehgal-doors-newdelhi/metal-door-with-lamination.html', '2021-03-30', '96-fire-door-with-lamination-500x500.jpg', 0),
(7, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'Metal door with service window', 'We proudly launch our new Designed Door built up specially keeping in mind the Day–to-Day use of any Domestic household. This Door is incorporated & processed after understanding the utmost needs, utility, safety & security of Old age people, children’s & women’s who are mostly at home & are more prone to any danger.', 'https://www.indiamart.com/sehgal-doors-newdelhi/metal-door-with-service-window.html', '2021-03-30', '558-metal-door-with-service-window-500x500.jpg', 0),
(8, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'Push bar for single leaf door', 'It is a Horizontal metal bar fixed to the inside area of a door. It is a press bar mechanism which can be pressed easily in order to open the Door and move out safely especially at the time of an emergency or panic situation.', 'https://www.indiamart.com/sehgal-doors-newdelhi/panic-bar.html#panic-exit-bar-one-point-latching-for-single-leaf-door', '2021-03-30', '152-push-bar-two-point-latching-for-single-leaf-door-250x250.jpg', 0),
(9, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'McAloo Tikki + Fries', 'McAloo Tikki and Fries (M) in just 103 rupees', 'https://www.swiggy.com/restaurants/mcdonalds-althan-piplod-surat-66597', '2021-03-30', '200-hticekhpzizcwsnkzund.png', 0),
(10, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'Masala Wedges + Fries', 'Masala Wedges + Fries (M) veg in just 104', 'https://www.swiggy.com/restaurants/mcdonalds-safal-pegasus-prahlad-nagar-ahmedabad-37687', '2021-03-30', '277-ttm2expxhqxp18hgmnhg.png', 0),
(11, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'Veg Maharaja Mac', 'Perfectly fried corn and cheese patty paired along with jalapeo, onion, slice of cheese & crunchy lettuce dressed with cocktail sauce.', 'https://www.swiggy.com/restaurants/mcdonalds-safal-pegasus-prahlad-nagar-ahmedabad-37687', '2021-03-30', '386-juw0d5slldnpcz6xe15k.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `listing_name` varchar(50) NOT NULL,
  `member_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_message` varchar(500) NOT NULL,
  `user_rating` varchar(20) NOT NULL,
  `review_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `listing_id`, `listing_name`, `member_email`, `user_name`, `user_email`, `user_message`, `user_rating`, `review_date`, `status`) VALUES
(38, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 'divyesh', 'tapidiploma@gmail.com', 'Best Care by the staffs of hospital , good work', '3', '2021-03-30', 0),
(39, 109, 'MacDonald Outlets', 'macdonald@gmail.com', 'divyesh', 'tapidiploma@gmail.com', 'Best work Macdonald , very fast work good going', '5', '2021-03-30', 0),
(40, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 'divyesh', 'tapidiploma@gmail.com', 'Mind Blowing work g m rao is the best lawyer of hydrabad', '5', '2021-03-30', 0),
(41, 120, 'karthikeya Travels', 'karthikeyatravels@gmail.com', 'divyesh', 'tapidiploma@gmail.com', 'Not Good Work , but affortable', '2', '2021-03-30', 0),
(42, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'divyesh', 'tapidiploma@gmail.com', 'Good Going amazing doors and furniture', '4', '2021-03-30', 0),
(43, 112, 'Bombay College Of Pharmacy', 'office@bcp.edu.in', 'divyesh', 'tapidiploma@gmail.com', 'Good For Education', '5', '2021-03-30', 0),
(44, 121, 'Brihaspathi Web Solution Company', 'info@brihaspathi.com', 'divyesh', 'tapidiploma@gmail.com', 'Best Work and ontime web design work for client, amazing good going', '3', '2021-03-30', 0),
(45, 111, 'Shree Swami Atmanand Saraswati Instutute Of Techno', 'admin@ssasit.ac.in', 'divyesh', 'tapidiploma@gmail.com', 'Amazing education college sashit', '5', '2021-03-30', 0),
(46, 110, 'Bombay Hospital and Research center', 'bombayhospital@gmail.com', 'amish', 'info@kiranhospital.com', 'Good health service good job', '4', '2021-03-30', 0),
(47, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 'amish', 'info@kiranhospital.com', 'good work in bail case', '4', '2021-03-30', 0),
(48, 108, 'Sehgal Doors', 'sales@sehgaldoors.com', 'amish', 'info@kiranhospital.com', 'good going', '3', '2021-03-30', 0),
(49, 122, 'G M Rao Advocate', 'gmrao@gmail.com', 'alish', 'guestcaredominos@jublfood.com', 'Amazing work and less time taken for solving case', '3', '2021-03-30', 0),
(50, 107, 'Hotel Ark Of Avalon', 'hotelarkofavalon@gmail.com', 'alish', 'guestcaredominos@jublfood.com', 'Good Service and fast service , best hotel', '5', '2021-03-30', 0),
(51, 102, 'Tapi Diploma Engineering College', 'tapidiploma@gmail.com', 'alish', 'guestcaredominos@jublfood.com', 'Top 5 diploma college, nice education provides', '4', '2021-03-30', 0),
(52, 119, 'Silver Life Gym', 'silverlifegym4@gmail.com', 'prath', 'macdonald@gmail.com', 'Best Gym for Workout and fitness', '4', '2021-03-30', 0),
(53, 116, 'Sahni Sales Electronics', 'sahnisales@gmail.com', 'prath', 'macdonald@gmail.com', 'Not good service, very coastly in tv price', '1', '2021-03-30', 0),
(54, 114, 'Studio 11 Salon and Spa', 'studio11@gmail.com', 'prath', 'macdonald@gmail.com', 'i would suggest other people to come at your salon, good service', '5', '2021-03-30', 0),
(55, 106, 'Surat Ford', 'suratford1@gmail.com', 'prath', 'macdonald@gmail.com', 'Best service Ford good going', '3', '2021-03-30', 0),
(56, 117, 'Shangar Decore', 'shangardecorltd@hotmail.com', 'prath', 'macdonald@gmail.com', 'The decoration is good but price is too coastly', '3', '2021-03-30', 0),
(57, 115, 'New khalsa Bakery', 'newkhalsabakery@yahoo.com', 'prath', 'macdonald@gmail.com', 'Amazing cakes near me', '4', '2021-03-30', 0),
(58, 118, 'Spipa UPSC Coaching Center', 'dg-spipa@gujarat.gov.in', 'prath', 'macdonald@gmail.com', 'they provide free coaching for upsc civil service, it was nice job', '4', '2021-03-30', 0),
(59, 103, 'Kiran Hospital', 'info@kiranhospital.com', 'prath', 'macdonald@gmail.com', 'good work and facilities', '5', '2021-03-30', 0),
(60, 104, 'Dominos pizza', 'guestcaredominos@jublfood.com', 'prath', 'macdonald@gmail.com', 'Best and amazing pizza', '5', '2021-03-30', 0),
(61, 105, 'Welcome Tours and travels', 'tours@allindiatours.com', 'prath', 'macdonald@gmail.com', 'Travl agency is good nice work', '5', '2021-03-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `verify_code` int(10) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `listing` int(10) NOT NULL DEFAULT 0,
  `fav_listing` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `email`, `contact`, `password`, `verify_code`, `type`, `listing`, `fav_listing`, `status`) VALUES
(33, 'divyesh', 'tapidiploma@gmail.com', '8320072230', 'tapi', 524927, 'free', 1, '', 1),
(34, 'amish', 'info@kiranhospital.com', '9016578345', 'kiran', 697436, 'free', 1, '', 1),
(35, 'alish', 'guestcaredominos@jublfood.com', '8929623865', 'dominos', 128044, 'free', 1, '', 1),
(36, 'vraj', 'tours@allindiatours.com', '9535678490', 'tours', 198404, 'standard', 1, '', 1),
(37, 'jaimish', 'suratford1@gmail.com', '9045678903', 'ford', 126004, 'standard', 1, '', 1),
(38, 'prajay', 'hotelarkofavalon@gmail.com', '7947225053', 'hotelarkofavalon', 543342, 'standard', 1, '', 1),
(39, 'chirag', 'sales@sehgaldoors.com', '9046767230', 'sehgaldoors', 325647, 'premium', 1, '', 1),
(40, 'prath', 'macdonald@gmail.com', '9873162936', 'macdonald', 577527, 'premium', 1, '', 1),
(41, 'ajay', 'bombayhospital@gmail.com', '8956389570', 'matushri', 835177, 'premium', 1, '', 1),
(42, 'rohan', 'admin@ssasit.ac.in', '9065893345', 'sashit', 300737, 'premium', 1, '', 1),
(43, 'akash', 'office@bcp.edu.in', '9046909045', 'bcp', 254214, 'premium', 1, '', 1),
(48, 'mayank', 'studio11@gmail.com', '9959995370', 'studio11', 447149, 'standard', 1, '', 1),
(49, 'harsh', 'newkhalsabakery@yahoo.com', '9814663862', 'newkhalsa', 126996, 'standard', 1, '', 1),
(50, 'rahul', 'sahnisales@gmail.com', '9988996009', 'sahnisales', 613803, 'standard', 1, '', 1),
(51, 'Amish', 'shangardecorltd@hotmail.com', '8934567891', 'shangar', 820513, 'free', 1, '', 1),
(52, 'jay', 'dg-spipa@gujarat.gov.in', '9034674589', 'spipa', 477416, 'free', 1, '', 1),
(53, 'Dhruv', 'silverlifegym4@gmail.com', '9825414284', 'silverlife', 845862, 'free', 1, '', 1),
(54, 'Niketan', 'karthikeyatravels@gmail.com', '9848170008', 'karthikeya', 637233, 'premium', 1, '', 1),
(55, 'Vaibhav', 'info@brihaspathi.com', '9000552766', 'brihaspathi', 190335, 'premium', 1, '', 1),
(56, 'G M Rao', 'gmrao@gmail.com', '9590059999', 'gmrao', 208756, 'premium', 1, '', 1),
(58, 'Siddharth', 'ganshyamcake@gmail.com', '7984035852', 'cake', 301601, 'standard', 1, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(10) NOT NULL,
  `visitor` int(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `visitor`, `status`) VALUES
(2, 1288, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals_offers`
--
ALTER TABLE `deals_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `listing_email` (`listing_email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_email` (`member_email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `deals_offers`
--
ALTER TABLE `deals_offers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
