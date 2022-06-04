-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2022 lúc 04:41 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bs`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name_user` varchar(100) CHARACTER SET utf8 NOT NULL,
  `total_money` float NOT NULL,
  `status` int(1) NOT NULL COMMENT '0: chưa giao hàng, 1: đang giao hàng, 2: đã giao hàng, 3: đã hủy',
  `date` datetime NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) NOT NULL,
  `note` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `name_user`, `total_money`, `status`, `date`, `address`, `email`, `phone`, `note`) VALUES
(2, 1, 'Trương Minh Tuấn', 369.6, 0, '2022-05-31 00:00:00', 'Hưng Yên', 'hoanganh@gmail.com', '0868452582', 'ATM'),
(3, 1, 'Trương Minh Tuấn', 370.5, 0, '2022-05-31 00:00:00', 'Hưng Yên', 'hoanganh@gmail.com', '0868452582', 'Live'),
(4, 1, 'Trương Minh Tuấn', 370.5, 0, '2022-05-31 00:00:00', 'Hưng Yên', 'hoanganh@gmail.com', '0868452582', 'ATM'),
(5, 1, 'Hoàng Anh', 179.34, 0, '2022-06-02 00:00:00', 'Hưng Yên', 'hoanganhh@gmail.com', '0868452582', 'ATM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number_star` int(11) NOT NULL,
  `comment` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_bill`
--

CREATE TABLE `detail_bill` (
  `detail_bill_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail_bill`
--

INSERT INTO `detail_bill` (`detail_bill_id`, `bill_id`, `product_id`, `price`, `amount`, `date`) VALUES
(3, 2, 3, 369.6, 1, '2022-05-31 00:00:00'),
(4, 3, 5, 123.5, 3, '2022-05-31 00:00:00'),
(5, 4, 5, 123.5, 3, '2022-05-31 00:00:00'),
(6, 5, 10, 179.34, 1, '2022-06-02 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `input_price` float NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL COMMENT 'đơn vị: %',
  `image` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `catalog_id`, `product_name`, `input_price`, `price`, `discount`, `image`, `author`, `description`) VALUES
(1, 9, 'Tad', 120, 125, 2, 'book1.png', 'Benji Davies', '<p>Tad Sometimes the biggest stories come from the smallest beginnings… Meet Tad. She’s the smallest tadpole in a big pond, and lives there with all her tadbrothers and tadsisters. Although...</p>'),
(2, 9, 'On A Magical Do-Nothing Day', 0, 370, 0, 'book2.jpg', 'Beatrice Alemagna', '<p>Give the gift of a magical do-nothing day! There&#39;s so much to notice in the world, if we can un-plug long enough. This picture book with startlingly beautiful words and pictures will spur imagination and a break from boredom or screen time. Now a New York Times Best Illustrated Book of the Year and Bank Street College of Education Best Children&#39;s Book of the Year! All I want to do on a rainy day like today is play my game. My mom says it&rsquo;s a waste of time, but without my game, nothing is fun! On the other hand, maybe I&rsquo;m wrong about that&hellip; While reading On a Magical Do-Nothing Day, one gets the sense that the illustrator became lost in her drawings, and as a reader, you&#39;ll want to do the same. Perfect for fans of picture books by Julie Morstad, Carson Ellis, Jon Klassen, and Tomi Ungerer. &ldquo;Hands down, Beatrice Alemagna is my favorite contemporary illustrator,&quot; said the Caldecott Honor-winning illustrator of Last Stop on Market Street, Christi'),
(3, 9, 'Here We Are', 368, 420, 12, 'book8.jpg', 'Oliver Jeffers', '<p>Oliver Jeffers, arguably the most influential creator of picture books today, offers a rare personal look inside his own hopes and wishes for his child--and in doing so gifts children and parents everywhere with a gently sweet and humorous missive about our world and those who call it home.\r\n\r\nInsightfully sweet, with a gentle humor and poignancy, here is Oliver Jeffers\' user\'s guide to life on Earth. He created it specially for his son, yet with a universality that embraces all children and their parents. Be it a complex view of our planet\'s terrain (bumpy, sharp, wet), a deep look at our place in space (it’s big), or a guide to all of humanity (don’t be fooled, we are all people), Oliver\'s signature wit and humor combine with a value system of kindness and tolerance to create a must-have book for parents.</p>'),
(4, 9, 'The Secret Garden', 265, 285, 0, 'book7.jpg', 'Frances Hodgson Burnett ', '<p>Celebrate an unforgettable classic with this paperback edition featuring the timeless art of Tasha Tudor. Just in time for the movie adaptation starring Colin Firth and Julie Walters!\r\n\r\nThis gorgeous paperback includes Tasha Tudor’s iconic illustrations, an extended author biography, activities, and more, making it the perfect collector’s edition or a wonderful gift for young readers.\r\n\r\nWhen orphaned Mary Lennox comes to live at her uncle\'s great house on the Yorkshire Moors, she finds it full of secrets. The mansion has nearly one hundred rooms, and her uncle keeps himself locked up. And at night, she hears the sound of crying down one of the long corridors.\r\n\r\nThe gardens surrounding the large property are Mary\'s only escape. Then, Mary discovers a secret garden, surrounded by walls and locked with a missing key. With the help of two unexpected companions, Mary discovers a way in—and becomes determined to bring the garden back to life.</p>'),
(5, 9, 'I Want A Dog: My Opinion Essay', 115, 130, 5, 'book6.png', 'Darcy Pattison', '<p>Hurrah for Essays! All English composition writing lessons should be this much fun.\r\n\r\n\r\n\r\nWhen cousins Dennis and Mellie decide to get a dog, they consider carefully what breed would be best for each family. For example, Dennis wants a big dog, but Mellie wants tiny. He has no other pets, but she has other pets that a dog must get along with. They consider different dog personalities, family situations, and personal preferences. Dennis writes an opinion essay for his teacher, Mrs. Shirky. But will his essay convince his parents to get the dog of his dreams?\r\n\r\n\r\n\r\nThis story takes a popular subject—kids getting a pet—and adds dogs of all sizes and shapes: all writing lessons should be this much fun. In the end, it’s cousins and the dogs that keep a reader turning the page. What kind of dog will Dennis choose? Will Mellie want the same kind of dog?\r\n</p>'),
(7, 1, 'Rapunzel\'s Journey Books', 115, 160, 5, 'b2.jpg', 'JacQueline Vaughn Roe', '<p>My tower was my prison, until I betrayed my witch.\r\n\r\nShe told me twisted tales by the fireside and allowed me books that filled me with longing. That was my life. It was all I had.\r\n\r\n‘Til one night, Paul heard me singing and convinced me to hope that we could escape together. Life could be different, if I had the courage to escape the witch’s grasp.\r\n\r\nBut she found and killed him. And she’s cast me out, alone. Without him. Without her.\r\n\r\nI don’t know where to go, how to find food, or even who to trust in this strange world. But isn’t that what she wants? For me to beg her to take me back? I may know nothing of the world beyond my tower, except this.\r\n\r\nI’m never returning to my prison. She’ll never control me again.\r\n\r\nRapunzel’s journey begins weaving fairy tales and faith together in a lyrical retelling you won’t forget.\r\n\r\nThis boxset includes books 1-3: Beyond the Tower, Amidst the Castles, Within the Spell plus a bonus short story, A Very Amis Christmas.</p>'),
(8, 4, 'Death in the Sunshine', 0, 199, 10, 'b3.jpg', 'Steph Broadribb', '<p>Four ex-cops in a retirement paradise. Sure they&rsquo;ll rest&hellip;when the killer is caught. After a long career as a police officer, Moira hopes a move to a luxury retirement community will mean she can finally leave the detective work to the youngsters and focus on a quieter life. But it turns out The Homestead is far from paradise. When she discovers the body of a young woman floating in one of the pools, surrounded by thousands of dollar bills, her crime-fighting instinct kicks back in and she joins up with fellow ex-cops&mdash;and new neighbours&mdash;Philip, Lizzie and Rick to investigate the murder. With the case officers dropping ball after ball, Moira and the gang take matters into their own hands, turning into undercover homicide investigators. But the killer is desperate to destroy all the evidence and Moira, Philip, Lizzie and Rick soon find themselves getting in the way&mdash;of the murderer and the police. Just when they think they can finally relax, they discover '),
(9, 4, 'Murder in the Hollows', 322, 360, 5, 'b4.jpg', 'Declan James', '<p>One small town’s dark secrets lay hidden in the hollows…\r\n\r\nRumors have swirled around Jake Cashen his whole life. Is he crazy like his father? Is it true they booted him out of the F.B.I. right after he cracked a career-making RICO case? Was he dirty?\r\n\r\nOnly Jake knows and he’s not telling.\r\n\r\nHe came back to his tiny hometown at the foot of Ohio’s Blackhand Hills to serve as a deputy sheriff. He hopes to punch a clock and keep his head down until retirement.\r\n\r\nIt was a solid plan. Until someone put a bullet in the head of a revered county judge.\r\n\r\nJake’s new boss knows Jake has a particular set of skills. The Sheriff pins a detective badge on him whether Jake likes it or not. He could have said no. But as Jake watches the locals nearly bungle the case in the first five minutes, he knows he’s all in.\r\n\r\nAs Jake digs into the murder, he soon learns Judge Rand had enemies in every corner. And someone hiding in plain sight may be plotting to bring his investigation to a deadly end.'),
(10, 2, 'Hauler: A Futuristic Action Adventure', 150, 183, 2, 'b5.jpg', 'Eric Kruger', '<p>Earth is no longer made up of countries and nations. Every bit of land has been privatized, and most of it is owned by five big corporations. Life is hard, and people are struggling. Crime is rampant, and they send serious offenders to Mars to help with the terraforming.\r\n\r\nBenjamin Drake is a happy-go-lucky truck driver (or hauler) with an uncomplicated life, hauling cargo around the world in his Hydrostar, until a run of bad decisions leaves him without work. Down on his luck and desperate for a contract, he makes a decision that he instantly regrets. As Drake gets caught in a tug of war between a mining mogul and the world\'s most ruthless security force, he suddenly finds himself with a truck full of stolen cargo, and decisions need to be made. But who can he trust?\r\n\r\nAfter a big professional blunder, Lt. Lily Wells plots a way to get her career back on track as one of Penta Corporations’ top security officers. But when Wells ends up on a murder case, she uncovers something much'),
(11, 2, 'Kingdoms at War: An Epic Fantasy Adventure', 350, 386, 10, 'b6.jpg', 'Lindsay Buroker', '<p>As a cartography student, Jak has always dreamed of finding the lost dragon gate and exploring and mapping distant worlds.\r\n\r\nDeveloping magical powers and becoming a powerful wizard? Not a chance.\r\n\r\nWizards are cruel and inhumane, warring with each other from their great sky cities and keeping most of humanity enslaved. Jak wants nothing to do with them.\r\n\r\nBut when he and his archaeologist mother unearth the gate, they attract the attention of the very wizards they sought to avoid. Even more troubling, Jak starts developing magical powers of his own, powers that could rival those of the great rulers.\r\n\r\nFate may have given him the opportunity to change the world.\r\n\r\nBut the wizard rulers don’t like change, and when they detect threats, they send their elite assassins to eliminate them.\r\n\r\nIf Jak can’t unlock the power of the gate, and the powers within himself, the world will remain enslaved forever.</p>'),
(14, 8, 'Read People Like a Book', 322, 369, 0, 'b7.jpg', 'Patrick King', '<p>Speed read people, decipher body language, detect lies, and understand human nature.\r\nIs it possible to analyze people without them saying a word? Yes, it is. Learn how to become a “mind reader” and forge deep connections.\r\nHow to get inside people’s heads without them knowing.\r\nRead People Like a Book isn’t a normal book on body language of facial expressions. Yes, it includes all of those things, as well as new techniques on how to truly detect lies in your everyday life, but this book is more about understanding human psychology and nature. We are who we are because of our experiences and pasts, and this guides our habits and behaviors more than anything else. Parts of this book read like the most interesting and applicable psychology textbook you’ve ever read. Take a look inside yourself and others!\r\nUnderstand the subtle signals that you are sending out and increase your emotional intelligence.\r\nPatrick King is an internationally bestselling author and social skills coach. His '),
(15, 8, 'What Happened to You?', 260, 289, 0, 'b8.jpg', 'Oprah Winfrey', '<p>\"[Oprah Winfrey and Bruce D. Perry] are both capable, likable narrators who are sincerely engaged with their subject matter...The performances of these two humanitarians make this a must-hear for anyone recovering from their traumatic past.\" (AudioFile Magazine)\r\n\r\nThis program is read by the authors.\r\n\r\nOur earliest experiences shape our lives far down the road, and What Happened to You? provides powerful scientific and emotional insights into the behavioral patterns so many of us struggle to understand.\r\n\r\n“Through this lens we can build a renewed sense of personal self-worth and ultimately recalibrate our responses to circumstances, situations, and relationships. It is, in other words, the key to reshaping our very lives.\" (Oprah Winfrey)\r\n\r\nThis audiobook is going to change the way you see your life.\r\n\r\nHave you ever wondered \"Why did I do that?\" or \"Why can\'t I just control my behavior?\" Others may judge our reactions and think, \"What\'s wrong with that person?\" When questioning'),
(16, 7, 'The Cat Who Saved Books', 250, 299, 5, 'b9.jpg', 'Sosuke Natsukawa', '<p>An Indie Next Pick!\r\n\r\nFrom the number one best-selling author in Japan comes a celebration of books, cats, and the people who love them, infused with the heartwarming spirit of The Guest Cat and The Travelling Cat Chronicles.\r\n\r\nBookish high school student Rintaro Natsuki is about to close the secondhand bookstore he inherited from his beloved bookworm grandfather. Then, a talking cat appears with an unusual request. The feline asks for — or rather, demands — the teenager’s help in saving books with him. The world is full of lonely books left unread and unloved, and the cat and Rintaro must liberate them from their neglectful owners. \r\n\r\nTheir mission sends this odd couple on an amazing journey, where they enter different mazes to set books free. Through their travels, the cat and Rintaro meet a man who leaves his books to perish on a bookshelf, an unwitting book torturer who cuts the pages of books into snippets to help people speed read, and a publishing drone who only wants to c'),
(17, 7, 'The Midnight Library', 164, 200, 0, 'b10.jpg', 'Matt Haig', '<p>The number one New York Times best-selling worldwide phenomenon\r\n\r\nWinner of the Goodreads Choice Award for Fiction\r\n\r\nA Good Morning America Book Club Pick\r\n\r\nIndependent (London) 10 Best Books of the Year\r\n\r\n\"A feel-good book guaranteed to lift your spirits.\" (The Washington Post)\r\n\r\nThe dazzling favorite about the choices that go into a life well lived, from the acclaimed author of How to Stop Time and The Comfort Book.\r\n\r\nSomewhere out beyond the edge of the universe there is a library that contains an infinite number of books, each one the story of another reality. One tells the story of your life as it is, along with another book for the other life you could have lived if you had made a different choice at any point in your life. While we all wonder how our lives might have been, what if you had the chance to go to the library and see for yourself? Would any of these other lives truly be better?\r\n\r\nIn The Midnight Library, Matt Haig\'s enchanting blockbuster novel, Nora Seed fi'),
(18, 7, 'The Giver of Stars', 310, 366, 10, 'b11.jpg', 'Jojo Moyes', '<p>Number one New York Times best seller\r\n\r\nA Reese Witherspoon x Hello Sunshine Book Club pick \r\n\r\nUSA Today\'s top 100 books to read while stuck at home social distancing\r\n\r\n“I’ve been a huge Jojo Moyes fan. Her characters are so compelling.... It’s such a great narrative about personal strength and really captures how books bring communities together.” (Reese Witherspoon)\r\n\r\nFrom the author of Me Before You, set in Depression-era America, a breathtaking story of five extraordinary women and their remarkable journey through the mountains of Kentucky and beyond.\r\n\r\nAlice Wright marries handsome American Bennett Van Cleve hoping to escape her stifling life in England. But small-town Kentucky quickly proves equally claustrophobic, especially living alongside her overbearing father-in-law. So, when a call goes out for a team of women to deliver books as part of Eleanor Roosevelt’s new traveling library, Alice signs on enthusiastically. \r\n\r\nThe leader, and soon Alice\'s greatest ally, is Ma'),
(20, 6, 'Make Your Art No Matter What: Moving Beyond Creative Hurdles', 160, 199, 2, 'b15.jpg', 'Beth Pickens', '<p>The Artist\'s Way for the 21st century-from esteemed creative counselor Beth Pickens.\r\n\r\nIf you are an artist, you need to make your art. That\'s not an overstatement - it\'s a fact; if you stop doing your creative work, your quality of life is diminished. But what do you do when life gets in the way? In this down-to-earth handbook, experienced artist coach Beth Pickens offers practical advice for developing a lasting and meaningful artistic practice in the face of life\'s inevitable obstacles and distractions. This thoughtful volume suggests creative ways to address the challenges all artists must overcome - from making decisions about time, money, and education, to grappling with isolation, fear, and anxiety. No matter where you are in your art-making journey, this book will motivate and inspire you. Because not only do you need your art - the world needs it, too.\r\n\r\nExpert Advice: Beth Pickens is an experienced and passionate arts advocate with extensive insight into working through '),
(21, 5, 'The Last House on Needless Street', 310, 365, 5, 'b13.jpg', 'Catriona Ward', '<p>\"The buzz...is real. I\'ve read it and was blown away. It\'s a true nerve-shredder that keeps its mind-blowing secrets to the very end.\" (Stephen King)\r\n\r\nCatriona Ward\'s The Last House on Needless Street is a shocking and immersive listen perfect for fans of Gone Girl and The Haunting of Hill House.\r\n\r\n“The new face of literary dark fiction.” (Sarah Pinborough, New York Times best-selling author of Behind Her Eyes)\r\n\r\nIn a boarded-up house on a dead-end street at the edge of the wild Washington woods lives a family of three.\r\n\r\nA teenage girl who isn’t allowed outside, not after last time.\r\n\r\nA man who drinks alone in front of his TV, trying to ignore the gaps in his memory.\r\n\r\nAnd a house cat who loves napping and reading the Bible.\r\n\r\nAn unspeakable secret binds them together, but when a new neighbor moves in next door, what is buried out among the birch trees may come back to haunt them all.\r\n\r\nA Macmillan Audio production from Tor Nightfire</p>'),
(22, 5, 'Cunning Folk', 0, 255, 0, 'b14.jpg', 'Adam Nevill', '<p>A compelling folk-horror story of deadly rivalry and the oldest magic from the author of The Ritual, The Reddening, No One Gets Out Alive and the four times winner of The August Derleth Award for Best Horror Novel. No home is heaven with hell next door. Money&#39;s tight and their new home is a fixer-upper. Deep in rural South West England, with an ancient wood at the foot of the garden, Tom and his family are miles from anywhere and anyone familiar. His wife, Fiona, was never convinced that buying the money-pit at auction was a good idea. Not least because the previous owner committed suicide. Though no one can explain why. Within days of crossing the threshold, when hostilities break out with the elderly couple next door, Tom&#39;s dreams of future contentment are threatened by an escalating tit-for-tat campaign of petty damage and disruption. Increasingly isolated and tormented, Tom risks losing his home, everyone dear to him, and his mind. Because, surely, only the mad would</p>'),
(23, 3, 'Avatar The Last Airbender', 310, 399, 10, '16.jpg', 'Meredith McClaren', '<p>Both your favorite avatars return in two all-new stories from Avatar: The Last Airbender and The Legend of Korra! Dive into the fun for Free Comic Book Day, and expect excitement, familiar faces, and a hefty helping of shenanigans!</p>'),
(24, 3, 'Batman Detective', 95, 199, 0, 'b17.jpg', 'Mariko Tamaki', '<p>Batman has deployed one of his most powerful weapons in the hunt for the mysterious bomber plaguing Gotham City…but it’s not the Batmobile, the Batwing, or even the batarangs. It’s Bruce Wayne! As Bruce investigates the courtroom bombing that nearly left Deb Donovan’s daughter a splatter on the wall, could there be…love in the air?</p>'),
(26, 6, 'Art of Tea', 100, 135, 0, 'b12.jpg', 'Steve Schwartz', '<p>Have you ever wished the world would just stop for a minute? What if it could? As a teenager, Steve Schwartz lived in 24/7 survival mode, going hungry whenever he couldn&rsquo;t find enough work to pay for a school lunch. At the age of eighteen, he nursed his dying mother through the final stages of terminal cancer. His mother&rsquo;s death launched him on a journey to the far reaches of the world, where he discovered a passion for the ancient, calming rituals of tea. Fascinated by the craft, he voyaged with sages and tea gurus around the globe, sourcing in far-flung fields and developing award-winning blends along the way, turning that passion into world-renowned teas. Join Steve, the founder of Art of Tea, as he reveals the surprising true story behind its international success. Learn how he grew a tiny tea concept into partnerships with brands like Wolfgang Puck, Caesars Palace, Disney, and Vera Wang, all through the timeless ritual of tea itself&mdash;and its mysterious ability&'),
(28, 9, 'Oh, the Places You Will Go', 256, 356, 12, 'ha.jpg', 'Dr.Seuss ', '<p>From soaring to high heights and seeing great sights to being left in a Lurch on a prickle-ly perch, Dr. Seuss addresses life&rsquo;s ups and downs with his trademark humorous verse and whimsical illustrations.<br />\r\n<br />\r\nThe inspiring and timeless message encourages readers to find the success that lies within, no matter what challenges they face. A perennial favorite and a perfect gift for anyone starting a new phase in their life!</p>\r\n'),
(29, 1, 'An Illustrated Treasury of Grimm of Fairy Tales', 256, 356, 2, 'b1.png', 'The Brothers Grimm', '<p>Two hundred years ago, the Brothers Grimm published their famous collection of folk tales, including these thirty much-loved stories of helpful elves; giants who can see into the next land; foolish but good-hearted lads; princesses with golden hair; faithful servants and wicked queens.</p>\r\n\r\n<p>This sumptuously illustrated collection of essential Grimm classics includes stories every childhood needs:&nbsp;The Princess and the Frog,&nbsp;Little Red Riding Hood,&nbsp;Sleeping Beauty,&nbsp;Cinderella,&nbsp;Rumpelstiltskin&nbsp;and dozens more.</p>\r\n\r\n<p>Each tale is brought to life with radiant, faithful pictures from Daniela Drescher, one of Germany&#39;s best-loved illustrators, which are sure to fire any child&#39;s imagination.</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_catalog`
--

CREATE TABLE `product_catalog` (
  `catalog_id` int(11) NOT NULL,
  `catalog_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_catalog`
--

INSERT INTO `product_catalog` (`catalog_id`, `catalog_name`) VALUES
(1, 'Fairy tales'),
(2, 'Adventure'),
(3, 'Comic	'),
(4, 'Detective	'),
(5, 'Horror'),
(6, 'Art'),
(7, 'Novel'),
(8, 'Psychology	'),
(9, 'Children\'s books');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(256) CHARACTER SET utf8 NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `fullname`, `address`, `phone`) VALUES
(1, 'hoanganh@gmail.com', '123', 'Trương Minh Tuấn', 'Hanoi', '0868452582'),
(3, 'hoanganhh@gmail.com', '123', 'Hoàng Anh', 'Hưng Yên', '0868452582');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`detail_bill_id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `catalog_id` (`catalog_id`);

--
-- Chỉ mục cho bảng `product_catalog`
--
ALTER TABLE `product_catalog`
  ADD PRIMARY KEY (`catalog_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `detail_bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `product_catalog`
--
ALTER TABLE `product_catalog`
  MODIFY `catalog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`),
  ADD CONSTRAINT `detail_bill_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catalog_id`) REFERENCES `product_catalog` (`catalog_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
