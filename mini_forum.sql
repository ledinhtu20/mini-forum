-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 06:17 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mini_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE IF NOT EXISTS `icons` (
  `icon_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`icon_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`icon_name`) VALUES
('apple'),
('asterisk'),
('book'),
('bookmark'),
('education'),
('envelope'),
('file'),
('film'),
('glass'),
('grain'),
('heart'),
('list-alt'),
('map-marker'),
('music'),
('paperclip'),
('picture'),
('piggy-bank'),
('plus'),
('search'),
('tag'),
('tags'),
('th'),
('th-large'),
('tint'),
('trash'),
('tree-deciduous');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `is_verified` bit(1) NOT NULL DEFAULT b'0',
  `post_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit_time` timestamp NULL DEFAULT NULL,
  `icon_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'th',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `topic_id`, `is_verified`, `post_title`, `post_content`, `created_time`, `last_edit_time`, `icon_name`, `username`) VALUES
(1, 9, '0', 'Bài viết đầu tiên (đã sửa)', '<h4><font face="Arial">Xin chào, đây là bài viết đầu tiên của diễn đàn!</font></h4><div><div><font face="Georgia">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sodales nunc nec lectus tristique vehicula vitae non leo. Nulla in erat ut dui pretium vehicula nec nec quam. Nunc sed mauris tortor. Fusce id sapien accumsan, aliquet felis quis, consequat enim. Nam sed lacus vitae magna suscipit dictum nec non felis. Curabitur eget eleifend enim. Integer congue ipsum finibus, hendrerit augue vitae, congue elit. Vivamus ornare vestibulum magna in fringilla. Aenean ex ipsum, facilisis ut convallis nec, eleifend eu ex. Morbi luctus posuere libero sed auctor.</font></div><div><font face="Georgia"><br></font></div><div><font face="Georgia">Duis sit amet magna et est facilisis lacinia. Maecenas ac congue nunc, rhoncus molestie metus. Praesent dignissim arcu sit amet maximus maximus. Aenean varius nibh eu nisl sagittis, vel vehicula nunc ultrices. Nullam eu tristique arcu. Proin id blandit erat, vel blandit lorem. Sed et leo in diam rhoncus auctor. Aenean posuere nibh quis sem pretium aliquam. In bibendum rutrum viverra. Vivamus ornare aliquam consequat. Cras consectetur justo purus, sed sollicitudin massa tristique feugiat. Curabitur id maximus mi, at consectetur sem.</font></div><div><font face="Georgia"><br></font></div><div><font face="Georgia">Integer erat enim, pretium ac sem vel, volutpat tempor metus. Vestibulum at imperdiet magna. Integer quam turpis, aliquet non eleifend eget, placerat quis orci. Nunc erat leo, accumsan id nunc id, sodales euismod elit. Aliquam ut sapien suscipit, tempor neque sed, condimentum ex. Aenean aliquam quam enim, ut hendrerit orci lacinia vel. Vestibulum rutrum sit amet nulla ut mollis. Pellentesque nec iaculis odio. Phasellus iaculis a lorem at venenatis.</font></div><div><font face="Georgia"><br></font></div><div><font face="Georgia">Suspendisse bibendum nulla eget odio maximus, in luctus libero blandit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi orci ligula, porttitor vitae maximus in, cursus nec dolor. Morbi rhoncus luctus efficitur. Integer tempor malesuada orci, a malesuada nisi dignissim in. Etiam eget dui metus. Mauris pulvinar placerat nulla a pulvinar. Vivamus elementum ligula nisl, quis vestibulum ante suscipit sed. Sed consequat scelerisque nulla. Donec rutrum, sem ut lacinia congue, quam metus ullamcorper nulla, et dictum velit neque ut urna. Vivamus eget ornare ex.</font></div><div><font face="Georgia"><br></font></div><div><font face="Georgia">Phasellus cursus nibh sed dui posuere egestas. Integer eget ultrices nibh. Aenean ut tincidunt est. Phasellus eget tortor a nibh lobortis suscipit vitae eu est. Ut faucibus tempus tellus placerat vulputate. In cursus maximus purus, sit amet egestas tellus efficitur at. Nulla volutpat, nibh id accumsan dictum, tellus metus pretium lectus, sed accumsan turpis ligula non dui. Fusce eu sem velit. Pellentesque non lorem non purus pulvinar porttitor. Cras ultrices scelerisque tincidunt. Nunc eu ligula orci. Vestibulum non ex vel erat fermentum vestibulum ac et neque. Vivamus porta ultricies ex, a dapibus nulla ultricies et. Nullam ut viverra nisi.</font></div></div>', '2016-05-11 04:58:24', '2016-05-12 01:40:27', 'certificate', 'member'),
(2, 9, '1', 'Dế Mèn phiêu lưu kí - Tô Hoài', '<i><b>Dế Mèn phiêu lưu kí </b>là tác phẩm văn xuôi đặc sắc và nổi tiếng nhất của <b>Tô Hoài</b> viết về loài vật, dành cho lứa tuổi thiếu nhi. Ban đầu truyện có tên là "Con dế mèn" (chính là ba chương đầu của truyện) do nhà xuất bản Tân Dân, Hà Nội phát hành năm 1941. Sau đó, được sự ủng hộ nhiệt tình của nhân dân, Tô Hoài viết thêm truyện "Dế Mèn phiêu lưu kí" (là bảy chương cuối của chuyện". Năm 1955, ông mới gộp hai chuyện vào với nhau để thành truyện "Dế mèn phiêu lưu kí" như ngày nay. Truyện đã được đưa vào chương trình học lớp 6 học kì 2 môn Ngữ Văn của Việt Nam.</i><div><h4><b>Nội dung</b></h4><div>Truyện gồm 10 chương, kể về những cuộc phiêu lưu của Dế Mèn qua thế giới muôn màu muôn vẻ của những loài vật nhỏ bé.</div><div><ul><li><span style="line-height: 1.42857;">Chương 1 kể về bài học đường đời đầu tiên của Dế Mèn.</span></li><li><span style="line-height: 1.42857;">Chương hai tới chương chín kể về những cuộc phiêu lưu của Mèn, với người bạn đường là Dế Trũi.</span></li><li><span style="line-height: 1.42857;">Chương mười kể về việc Mèn cùng Trũi về nhà và nghỉ ngơi, dự tính cuộc phiêu lưu mới.</span></li></ul></div></div>', '2016-05-11 05:29:37', '2016-05-12 11:13:19', 'tree-deciduous', 'member'),
(3, 1, '1', 'Bình Ngô Đại Cáo - Nguyễn Trãi', '<div><i><b>Bình Ngô đại cáo</b> (chữ Hán: </i>平吳大誥<i>) là bài cáo bằng văn bản do <b>Nguyễn Trãi </b>soạn thảo, viết bằng chữ Hán vào mùa xuân năm 1428, thay lời Bình Định Vương Lê Lợi để tuyên cáo kết thúc việc giành chiến thắng trong cuộc kháng chiến với nhà Minh, khẳng định sự độc lập của nước Đại Việt. Đây được coi là bản Tuyên ngôn độc thứ hai của Việt Nam sau bài Nam quốc sơn hà. Bình Ngô đại cáo là tác phẩm văn học với chức năng hành chính quan trọng đối với lịch sử dân tộc Việt Nam và là tác phẩm có chất lượng văn học tốt đẹp.</i></div><div><br></div><h4><b>Bối cảnh</b></h4><div>Năm 1427, quân khởi nghĩa Lam Sơn đánh tan 2 đạo viện binh của quân Minh do Liễu Thăng và Mộc Thạnh chỉ huy. Lê Thái Tổ sai người mang viên tướng bị bắt sống Hoàng Phúc, hai cái hổ phù, hai dấu đài ngân của quan Chinh Lỗ Phó Tướng Quân về thành Đông Quan cho Vương Thông biết. Vương Thông đang cố thủ trong thành Đông Quan biết viện binh đã bị thua, hoảng sợ viết thư xin hòa.</div><div><br></div><div>Lê Thái Tổ chấp thuận, sai sứ mang tờ biểu và vật phẩm sang nhà Minh, vua Minh sai quan Lễ Bộ Thị Lang là Lý Kỳ đưa chiếu sang phong cho Trần Cảo làm An Nam Quốc Vương, bỏ tòa Bố Chính và triệt quân về Tàu. Tháng chạp năm Đinh Mùi, Vương Thông theo lời ước với Bình Định Vương Lê Lợi, đem bộ binh qua sông Nhị Hà, còn thủy quân theo sau. Vì quân Minh tàn bạo, có người khuyên Lê Lợi đem quân mà giết hết đi, Lê Lợi không chấp thuận, cấp lương thảo và vật dụng cho quân Minh trở về. Năm 1428, Lê Lợi dẹp yên quân Minh, liền sai Nguyễn Trãi thay lời ngài làm tờ bá cáo cho thiên hạ biết.</div><div><br></div><div>Tờ cáo là một thông báo có người dân trong nước về việc đánh bại nhà Minh và sự khẳng định sự độc lập của Đại Việt. Nguyễn Trãi viết Bình Ngô đại cáo không chỉ tuyên bố độc lập, mà còn khẳng định sự bình đẳng của Đại Việt với Trung Quốc trong lịch sử từ trước đến nay và thể hiện nhiều ý tưởng về sự công bằng, vai trò của người dân trong lịch sử và cách giành chiến thắng của quân khởi nghĩa Lam Sơn. Ngoài ra, Nguyễn Trãi sử dụng Bình Ngô đại cáo để chứng minh tính chính nghĩa của cuộc khởi nghĩa Lam Sơn và trả lời câu hỏi tại sao quân khởi nghĩa Lam Sơn có thể chiến thắng quân đội nhà Minh đó là chính sách dựa vào nhân dân.</div><div><br></div><h4><b>Nội dung</b></h4><div>Bài Bình Ngô đại cáo là một thông báo bằng văn bản dưới hình thức văn học của thể văn biền ngẫu, được viết bằng chữ Hán, được dịch sang tiếng Việt bởi một số học giả như Ngô Tất Tố, Bùi Kỷ, Trần Trọng Kim. Kết cầu bài cáo gổm 5 đoạn:</div><div><ul><li><span style="line-height: 1.42857;">Đoạn 1: Từ đầu... đến Chứng cứ rành rành. : Khẳng định tư tưởng nhân nghĩa và chân lí về chủ quyền độc lập của quốc gia Đại Việt.</span></li><li><span style="line-height: 1.42857;">Đoạn 2: Từ Vừa rồi... đến Trời đất chẳng dung tha. : Tố cáo và kết án tội ác tày trời của giặc Minh.</span></li><li><span style="line-height: 1.42857;">Đoạn 3: Từ Ta đây... đến Lấy yếu chống mạnh, thường đánh bất ngờ: Hình ảnh của vị lãnh tụ nghĩa quân Lam Sơn và những khó khăn trong buổi đầu dấy nghiệp.</span></li><li><span style="line-height: 1.42857;">Đoạn 4: Từ Rốt cuộc: Lấy đại nghĩa thắng hung tàn,... đến Mà cũng xưa nay chưa từng nghe thấy: Quá trình mười năm kháng chiến và thắng lợi vẻ vang.</span></li><li><span style="line-height: 1.42857;">Đoạn 5: Phẩn còn lại: Khẳng định ý nghĩa to lớn của cuộc khởi nghĩa Lam Sơn vả lời tuyên bố hoà bình.</span></li></ul></div>', '2016-05-11 05:30:07', '2016-05-12 10:57:51', 'apple', 'member2'),
(4, 10, '1', 'Bài viết đã được kiểm duyệt 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sapien enim, tincidunt nec accumsan non, commodo a p<b>urus. Curabitur justo eros, eleifend in aliquam eget, vehicula id orci. Aliquam tincidunt eu nunc id aliquam. Phasellus in finibus mi, in volutpat ma</b>uris. Cras vel est non ipsum vulputate consectetur vel eu mauris. Duis tempor auctor elit, sit amet tempus orci egestas sed. Nullam suscipit, nisi sed dapibus blandit, felis nisi gravida ligula, eu volutpat est diam rhoncus odio. Aliquam lacinia luctus odio, eget mattis dui vehicula ut. Mauris dapibus volutpat aliquam. Fusce in eg<b>estas tellus, eu ultricies lacus. Integer neque ex, facilisis id mattis eget, vehicula non velit. Nullam ullamcorper pharetra neque, ut pu</b>lvinar sapien vulputate at. In feugiat hendrerit rutrum. Ut ac est at metus viverra facilisis ac quis mauris. Vestibulum turpis odio, laoreet eget mattis non, pretium ac arcu. Vestibulum semper justo sit amet elit vehicula interdum. Duis condimentum sagittis ligula sollicitudin tempor. Curabitur ante velit, facilisis eget augue posuere, gravida consectetur eros. Integer et malesuada risus. Maecenas quis tempus nibh, sed iaculis diam. Etiam eget felis tempus, hendrerit mi et, venenatis dui. Etiam at urna sem. Praesent venenatis justo nunc, eu maximus libero ', '2016-05-11 05:30:12', '2016-05-12 01:30:03', 'plane', 'member'),
(5, 6, '0', 'Bài viết chưa được kiểm duyệt 2 (updated)', '<h1><span style="line-height: 1.42857;"><b><font face="Palatino Linotype">Lorem ipsum dolor sit amet, </font></b></span></h1><h4><span style="line-height: 1.42857;"><b><font face="Comic Sans MS">consectetur adipiscing elit. </font></b></span></h4><ol><li><span style="line-height: 1.42857;"><font face="Comic Sans MS">Pellentesque sapien enim, tincidunt nec accumsan non, commodo a purus. </font></span></li><li><span style="line-height: 1.42857;"><font face="Comic Sans MS">Curabitur justo eros, eleifend in aliquam eget, vehicula id orci. </font></span></li><li><span style="line-height: 1.42857;"><font face="Comic Sans MS">Aliquam tincidunt eu nunc id aliquam. Phasellus in finibus mi, in volutpat mauris.</font></span></li></ol><div><div><span style="line-height: 1.42857;">Cras vel est non ipsum vulputate consectetur vel eu mauris. </span></div><div><b style="line-height: 1.42857;">Duis tempor auctor elit, sit amet tempus orci egestas sed. </b></div><div><span style="line-height: 1.42857;"><i>Nullam suscipit, nisi sed dapibus blandit, felis nisi gravida ligula, eu volutpat est diam rhoncus odio. </i></span></div><div><span style="line-height: 1.42857;"><u>Aliquam lacinia luctus odio, eget mattis dui vehicula ut. Mauris dapibus volutpat aliquam.</u></span></div></div>', '2016-05-11 05:32:42', '2016-05-11 23:54:18', 'plane', 'member2'),
(6, 9, '0', 'Bài viết thứ 3', '<h2>Integer ante neque, ullamcorper sed blandit eget, hendrerit a metus. Vestibulum tincidunt, ex id rutrum luctus, nibh mauris luctus arcu, et iaculis velit leo ut ipsum. Praesent accumsan in sapien at bibendum. Praesent in nisl at urna hendrerit aliquam id.</h2>', '2016-05-12 08:13:58', '2016-05-12 03:15:10', 'book', 'member3'),
(7, 9, '1', 'Tắt đèn - Ngô Tất Tố', '<i><b>Tắt đèn</b> là một trong những tác phẩm văn học tiêu biểu nhất của nhà văn <b>Ngô Tất Tố</b> (tiểu thuyết, in trên báo Việt nữ năm 1937). Đây là một tác phẩm văn học hiện thực phê phán với nội dung nói về cuộc sống khốn khổ của tầng lớp nông dân Việt Nam đầu thế kỉ 20 dưới ách đô hộ của thực dân Pháp.</i><div><h4><b>Nội dung</b></h4><div>Tác phẩm kể về nhân vật chính là chị Dậu. Trước khi lấy chồng chị vốn có tên là Lê Thị Đào, một cô gái đẹp, giỏi giang, tháo vát và (theo nhà văn là) sinh ra trong gia đình trung lưu.</div><div><br></div><div>Vốn lúc đầu, gia cảnh anh chị Dậu có dư dả, nhưng vì liền lúc mẹ và em trai anh Dậu cùng qua đời, anh chị dù đã hết sức cần kiệm nhưng vẫn phải tiêu quá nhiều tiền cho hai đám ma chay. Chưa hết, sau khi đám ma cho em trai xong, anh Dậu bỗng mắc bệnh sốt rét, không làm gì được, mọi vất vả dồn lên vai chị Dậu, khiến gia cảnh lâm vào hạng cùng đinh trong làng.</div><div><br></div><div>Mùa sưu đến, chị Dậu phải chạy vạy khắp nơi vay tiền để nộp cho chồng, nhưng không kiếm đâu ra. Anh Dậu dù bị ốm nhưng vẫn bị bọn cai lệ cùm kẹp lôi ra giam ở đình làng. Cuối cùng, bần quá, chị buộc lòng phải dứt ruột bán đi cái Tí, đứa con gái đầu lòng 7 tuổi ngoan ngoãn hiếu thảo, và ổ chó mới đẻ cho vợ chồng lão Nghị Quế để lấy hai đồng nộp sưu. Nhưng vừa đủ tiền nộp sưu cho chồng, bọn cai trong làng lại ép chị nộp cả tiền sưu cho em trai anh Dậu với lí do chết ở năm ta nhưng lúc đó lịch năm tây đã sang năm mới. Vậy là anh Dậu vẫn bị cùm kẹp không được về nhà.</div><div><br></div><div>Nửa đêm, anh Dậu dở sống dở chết được đưa về. Được bà con lối xóm giúp đỡ, anh dần tỉnh lại. Một bà lão hàng xóm tốt bụng cho chị bò gạo nấu cháo để anh ăn lại sức. Nhưng vừa kề bát cháo lên miệng, bọn cai lệ và người nhà lý trưởng ập vào ép sưu. Chị Dậu ra sức van xin không được, cuối cùng uất ức quá, chị đã ra tay đánh cả cai lệ và tên người nhà lý trưởng.</div><div><br></div><div>Phạm tội đánh người nhà nước, chị bị thúc giải lên quan. Tên quan huyện lại là tên dâm ô, định ra tay sàm sỡ chị. Chị bèn vứt tọt nắm bạc vào mặt hắn rồi vùng chạy.</div><div><br></div><div>Sau đó, chị may mắn gặp một người nhà quan cụ trên tỉnh. Người này cho chị 2 đồng nộp nốt tiền sưu và hứa hẹn cho chị công việc vắt sữa để quan cụ uống (do quan cụ đã rụng hết răng không ăn được cơm). Chị bèn về bàn với anh Dậu, cho cái Tỉu làm con nuôi nhà hàng xóm, lên tỉnh làm việc.</div><div><br></div><div>Thời gian đầu, chị làm được tiền và gửi về cho anh Dậu. Nhưng vào một đêm tối, quan cụ mò vào buồng của chị... Tác phẩm kết thúc bằng câu "Chị vùng chạy ra ngoài giữa lúc trời tối đen như mực, đen như cái tiền đồ của chị vậy"!</div></div>', '2016-05-12 08:27:10', '2016-05-12 10:48:46', 'book', 'member3'),
(11, 9, '1', 'Một bài viết mới', '<h4>Wikipedia languages</h4><div><i>This Wikipedia is written in English. Started in 2001, it currently contains 5,149,676 articles. Many other Wikipedias are available; some of the largest are listed below.</i></div><div><br></div><div>More than 1,000,000 articles: Deutsch Español Français Italiano Nederlands 日本語 Polski Русский Svenska Tiếng Việt</div><div>More than 250,000 articles: العربية Bahasa Indonesia Bahasa Melayu Català Čeština فارسی 한국어 Magyar Norsk bokmål Português Română Srpski Srpskohrvatski Suomi Türkçe Українська 中文</div><div>More than 50,000 articles: Bosanski Български Dansk Eesti Ελληνικά English (simple form) Esperanto Euskara Galego עברית Hrvatski Latviešu Lietuvių Norsk nynorsk Slovenčina Slovenščina ไทย</div>', '2016-05-12 11:31:38', '2016-05-12 10:21:05', 'heart', 'admin'),
(12, 9, '1', 'Lão Hạc - Nam Cao', '<div><i><b>Lão Hạc </b>là một truyện ngắn của nhà văn <b>Nam Cao </b>được viết năm 1943. Tác phẩm được đánh giá là một trong những truyện ngắn khá tiêu biểu của dòng văn học hiện thực, nội dung truyện đã phần nào phản ánh được hiện trạng xã hội Việt Nam trong giai đoạn trước Cách mạng tháng Tám.</i></div><div><br></div><h4><i><b>Tóm tắt nội dung</b></i></h4><div>Lão Hạc, một người nông dân chất phác, hiền lành. Lão góa vợ và có một người con trai nhưng vì quá nghèo nên không thể lấy vợ cho người con trai của mình. Người con trai lão vì thế đã rời bỏ quê hương để đến đồn điền cao su làm ăn kiếm tiền. Lão luôn trăn trở, suy nghĩ về tương lai của đứa con. Lão sống bằng nghề làm vườn, mảnh vườn mà vợ lão đã mất bao công sức để mua về và để lại cho con trai lão. So với những người khác lúc đó, gia cảnh của lão khá đầy đủ, tuy nhiên do sức không còn nên công việc đồng áng cũng tạm dưng, công việc do người khác thuê mướn cũng không có.</div><div><br></div><div>Lão có một con chó tên là Vàng - con chó do con trai lão trước khi đi đồn điền cao su đã để lại. Lão vừa coi như con vừa coi như một người thân trong gia đình. Tuy nhiên, vì gia cảnh nghèo khó không nuôi nổi nó nên ông lão đành cắn răng bán con chó đi. Lão đã rất dằn vặt bản thân mình khi mang một <i>"tội lỗi" </i>là đã nỡ tâm <i>"lừa một con chó"</i>. Lão đã khóc rất nhiều với ông giáo (người hàng xóm thân thiết của lão). Nhưng cũng kể từ đó, lão sống khép kín, lủi thủi một mình. Rồi một hôm, lão quyết định tìm đến cái chết để được giải thoát sau bao tháng ngày cùng cực, đau khổ.</div><div><br></div><div>Và sau khi trao gửi hết tài sản cũng như nhờ vả chuyện ma chay sau này cho ông giáo, Lão Hạc đã kết thúc cuộc đời bằng một liều bả chó do xin từ Binh Tư. Cái chết của lão đau đớn và dữ dội, gây cho người đọc nhiều sự xúc động, xót xa. Lão chết để bảo toàn lòng tự trọng của mình, không để cho cái đói, cái nghèo dồn vào con đường tha hóa như Binh Tư.</div><div><br></div><div>Truyện được thể hiện qua lời kể của nhân vật tôi - ông giáo, và dường như đâu đó trong nhân vật này ta thấy hiện giọng kể của Nam Cao.</div>', '2016-05-12 14:55:02', '2016-05-12 09:56:18', 'bookmark', 'admin'),
(13, 10, '0', 'Chiến tranh và hòa bình - Lev Nikolayevich Tolstoy', '<i><b>Chiến tranh và hòa bình</b> (tiếng Nga: Война и мир, Voyna i mir) là một bộ tiểu thuyết sử thi của Lev Nikolayevich Tolstoy, được nhà xuất bản Russki Vestnik in lần đầu từ năm 1865 đến 1869. Đây là tác phẩm phản ánh một giai đoạn bi tráng của toàn xã hội Nga, từ giới quý tộc đến nông dân, trong thời đại Napoléon, và được coi là một trong hai kiệt tác chính của Tolstoy (tác phẩm thứ hai là Anna Karenina). Chiến tranh và hòa bình cũng đồng thời được đánh giá là một trong những tiểu thuyết vĩ đại nhất của văn học thế giới.</i><div><h4><b>Nội dung</b></h4><div>Tác phẩm mở đầu với khung cảnh một buổi tiếp tân, nơi có đủ mặt các nhân vật sang trọng của giới quý tộc Nga tại kinh kỳ Sankt-Peterburg. Bên cạnh những câu chuyện thường nhật của giới quý tộc, người ta bắt đầu nhắc đến Hoàng đế Napoléon I và cuộc chiến tranh chống Pháp sắp tới mà Nga sắp tham gia. Trong số những tân khách hôm ấy có công tước Andrei Bolkonsky - một người trẻ tuổi, đẹp trai, giàu có, có cô vợ Liza xinh đẹp mới cưới và đang chờ đón đứa con đầu lòng. Và một vị khách khác là Pierre người con rơi của lão bá tước Bezoukhov, vừa từ nước ngoài trở về. Tuy khác nhau về tính cách, một người khắc khổ về lý trí, một người hồn nhiên sôi nổi song Andrei và Pierre rất quý mến nhau và đều là những chàng trai trung thực, luôn khát khao đi tìm lẽ sống. Andrei tuy giàu có và thành đạt nhưng chán ghét tất cả nên chàng chuẩn bị nhập ngũ với hy vọng tìm được chỗ đứng của một người đàn ông chân chính nơi chiến trường. Còn Pierre từ nước ngoài trở về nước Nga, tham gia vào các cuộc chơi bời và bị trục xuất khỏi Sankt-Peterburg vì tội du đãng. Pierre trở về cố đô Moskva, nơi cha chàng đang sắp chết. Lão bá tước Bezoukhov rất giàu có, không có con, chỉ có Pierre là đứa con rơi mà ông chưa công nhận. Mấy người bà con xa của ông xúm quanh giường bệnh với âm mưu chiếm đoạt gia tài. Pierre đứng ngoài các cuộc tranh chấp đó vì chàng vốn không có tình cảm với cha, nhưng khi chứng kiến cảnh hấp hối của người cha lúc lâm chung thì tình cảm cha con đã làm chàng rơi nước mắt. Lão bá tước mất đi để lại toàn bộ gia sản cho Pierre và công nhận chàng làm con chính thức. Công tước Kuragin không được lợi lộc gì trong cuộc tranh chấp ấy bèn tìm cách dụ dỗ Pierre. Vốn là người nhẹ dạ, cả tin nên Pierre rơi vào bẫy và phải cưới con gái của lão là Hélène, một cô gái có nhan sắc nhưng lẳng lơ và vô đạo đức.</div><div><br></div><div>Về phần Andrei chàng quyết định gởi vợ cho cha và em chăm sóc sau đó gia nhập Quân đội Nga. Khi lên đường Andrei mang một niềm hy vọng là có thể tìm thấy ý nghĩa cuộc sống cũng như công danh trên chiến trường. Chàng tham chiến trận đánh Austerlitz - nơi Napoléon I đã đánh tan nát quân Liên minh Nga - Áo, bản thân chàng thương nặng, bị bỏ lại chiến trường. Khi tỉnh dậy chàng nhìn thấy bầu trời xanh rộng lớn và sự nhỏ nhoi của con người, kể cả những mơ ước, công danh và kể cả Napoléon I - vốn là một thần tượng của chàng. Andrei được đưa vào trạm quân y và được cứu sống. Sau đó, chàng trở về nhà chứng kiến cái chết đau đớn của người vợ trẻ khi sinh đứa con đầu lòng. Cái chết của Lisa, cùng với vết thương và sự tiêu tan của giấc mơ Toulon - cầu Arcole đã làm cho Andrei tuyệt vọng. Chàng quyết định lui về sống ẩn dật. Có lần Pierre đến thăm Andrei và đã phê phán cách sống đó. Lúc này, Pierre đang tham gia vào hội Tam điểm với mong muốn làm việc có ích cho đời.</div><div><br></div><div>Một lần, Andrei có việc đến gia đình bá tước Rostov. Tại đây, chàng gặp Natalia (Natasha) con gái gia đình của bá tước Rostov. Chính tâm hồn trong trắng hồn nhiên và lòng yêu đời của nàng đã làm hồi sinh Andrei. Chàng quyết định tham gia vào công cuộc cải cách ở triều đình và cầu hôn Natasha. Chàng đã được gia đình bá tước Rostov chấp nhận, nhưng cha chàng phản đối cuộc hôn nhân này. Bá tước Bolkonsky (cha của Andrei) buộc chàng phải đi trị thương ở nước ngoài trong khoảng thời gian là một năm. Cuối cùng, chàng chấp nhận và xem đó như là thời gian để thử thách Natasha. Chàng nhờ bạn mình là Pierre đến chăm sóc cho Natasha lúc chàng đi vắng. Natasha rất yêu Andrei, song do nhẹ dạ và cả tin nên nàng đã rơi vào bẫy của Anatole con trai của công tước Vassili, nên Natasha và Anatole đã định bỏ trốn nhưng âm mưu bị bại lộ, nàng vô cùng đau khổ và hối hận. Sau khi trở về Andrei biết rõ mọi chuyện nên đã nhờ Pierre đem trả tất cả những kỷ vật cho Natasha. Nàng lâm bệnh, người chăm sóc và thông cảm cho nàng lúc này là Pierre.</div><div><br></div><div>Vào lúc này, nguy cơ chiến tranh giữa Pháp và Nga ngày càng đến gần. Cuối năm 1811, quân Pháp tiến dần đến biên giới Nga, quân Nga rút lui. Đầu năm 1812, quân Pháp tiến vào lãnh thổ Nga. Cuộc Chiến tranh Vệ quốc Nga bùng nổ. Vị tướng già Mikhail Koutouzov được cử làm Tổng tư lệnh quân đội Nga. Trong khi đó, quý tộc và thương gia được lệnh phải nộp tiền và dân binh. Pierre cũng nộp tiền và hơn một ngàn dân binh cho quân đội. Andrei lại gia nhập quân đội, ban đầu vì muốn trả thù tình địch, nhưng sau đó chàng bị cuốn vào cuộc chiến, bị cuốn vào tinh thần yêu nước của nhân dân. Trong trận Borodino, dưới sự chỉ huy của vị Nguyên soái Koutouzov quân đội Nga đã chiến đấu dũng cảm tuyệt vời, với kết quả là chiến thắng lớn lao về mặt tinh thần. Andrei cũng tham gia trận đánh này và bị thương nặng. Trong lán quân y, chàng gặp lại tình địch của mình cũng đang đau đớn vì vết thương. Mọi nỗi thù hận đều tan biến, chàng chỉ còn thấy một nỗi thương cảm đối với mọi người. Chàng được đưa về địa phương. Trên đường di tản, chàng gặp lại Natasha và tha thứ cho nàng. Và cũng chính Natasha đã chăm sóc cho chàng cho đến khi chàng mất.</div><div><br></div><div>Sau trận huyết chiến ở Borodino, quân Nga rút khỏi Moskva. Quân Pháp chiếm được Moskva nhưng có tâm trạng vô cùng lo sợ. Pierre trở về Moskva giả dạng thành thường dân để ám sát Napoléon. Nhưng âm mưu chưa thực hiện được thì chàng bị bắt. Trong nhà giam, Pierre gặp lại Platon Karataev, một triết gia nông dân. Bằng những câu chuyện của mình, Platon đã giúp Pierre hiểu thế nào là cuộc sống có nghĩa.</div><div><br></div><div>Quân Nga bắt đầu phản công và tái chiếm Moskva. Quân Pháp rút lui trong hỗn loạn. Nước Nga thắng lợi bằng chính tinh thần của cả dân tộc Nga chứ không phải do một cá nhân nào, đó là điều Koutouzov hiểu còn Napoléon thì không. Sau chiến thắng, Koutouzov muốn cho nước Nga được nghỉ ngơi chứ chẳng muốn can thiệp thêm gì vào tình hình châu Âu.</div><div><br></div><div>Trên đường rút lui của quân Pháp, Pierre đã trốn thoát và trở lại Moskva. Chàng hay tin Andrei đã mất và vợ mình cũng vừa mới qua đời vì bệnh. Chàng gặp lại Natasha, một tình cảm mới mẻ giữa hai người bùng nổ. Pierre quyết định cầu hôn Natasha. Năm 1813, hai người tổ chức đám cưới. Bảy năm sau, họ có bốn người con. Natasha lúc này không còn là một cô gái vô tư hồn nhiên mà đã trở thành một người vợ đúng mực. Pierre sống hạnh phúc nhưng không chấp nhận cuộc sống nhàn tản. Chàng tham gia vào những hội kín - đó là các tổ chức cách mạng của những người tháng Chạp.</div></div>', '2016-05-12 16:02:15', NULL, 'tint', 'member'),
(14, 10, '0', 'Thép đã tôi thế đấy - Nikolai Alekseyevich Ostrovsky', '<i><b>Thép đã tôi thế đấy! </b>(tiếng Ukraina: Як гартувалася сталь !, tiếng Nga: Как закалялась сталь !, Kak zakalyalasy staly) là một cuốn tiểu thuyết nổi tiếng của nhà văn Nikolai A.Ostrovsky.</i><div><br></div><div><h4><b>Nội dung</b></h4><div>Pavel Korchagin (thường được gọi là Pavlusha, Pavka) là một thanh niên lớn lên trong khi điều kiện đất nước đang gặp nhiều khó khăn. Cũng như bao thanh niên Liên Xô khác, anh cũng có người bạn gái chơi thân, cô tên là Tonya và sau này trở thành người yêu. Tonya là một cô gái xinh xắn, yêu Pavel với tất cả tình cảm ban đầu trong trắng ngây thơ của một thiếu nữ mới lớn. Tình cảm của hai người có lẽ sẽ rất đẹp và trọn vẹn nếu như không có chuyện Pavel đi theo tiếng gọi của lý tưởng giai cấp lúc đó, lý tưởng muốn cống hiến sức trẻ của mình phục vụ cho Tổ quốc, cho cách mạng, theo tiếng gọi của Đảng Cộng sản. Anh trai Pavel cũng theo con đường này. Tônhia rất yêu Pavel nhưng không thể đợi anh và theo anh, không dám yêu một lý tưởng. Nhà Tonya lại thuộc giai cấp tư sản. Pavel nói: "Anh trước hết là người của Đảng - sau đó mới là người của em và những người thân khác. Em có gan yêu một công nhân, nhưng lại không có gan yêu một lý tưởng".</div><div><br></div><div>Pavel đã chia tay Tonya mà theo lý tưởng mình đã xác định. Anh hăng hái, hồ hởi cống hiến sức trẻ thanh niên của mình cho những công việc phục vụ cho nhân dân, cho Tổ quốc. Trong thời gian xây dựng con đường sắt nhỏ nối khu rừng với thành phố, tình cờ Pavel đã gặp lại Tonya. Công việc ở đây rất cực nhọc, ngày đêm chịu đói rét, gian khổ để gấp rút hoàn thành cho kỳ được con đường sắt cho kịp trước khi mùa đông tới. Nếu không kịp thì tất cả mọi người trong thành phố này sẽ chết cóng vì không đủ gỗ để sưởi ấm. Do vậy, Tonya đã suýt không nhận ra anh vì trông anh đã hoàn toàn khác, rách rưới, tím tái vì giá lạnh, gầy gò như một người ăn xin và đang xúc tuyết, tuy có đôi mắt thì vẫn là Pavlusha ngày nào. Tuy nhiên, cô đã không dám bắt tay anh khi anh đưa tay ra và anh hiểu rằng, tình cảm cũ giữa hai người vĩnh viễn không còn nữa. Cô giờ đây đã có chồng và "sặc mùi băng phiến".</div><div><br></div><div>Sau này, trong quá trình lao động và sinh hoạt trong tổ chức Đảng, Pavel đã gặp Rita và được cô quý mến. Nhưng tình cảm giữa hai người chỉ giữ ở tình đồng chí... Về sau, có lúc Pavel bị bệnh sốt thương hàn và bị bại liệt, vôi hóa cột sống, phải ngồi xe lăn, có một y tá chăm sóc và động viên, dồn hết tình thương cho anh. Anh cảm thấy mình không được quyền lùi bước trước khó khăn, tin tưởng vào tình yêu mới và chuyển sang viết sách vẫn với ngọn lửa và chất thép đã được tôi luyện ngày nào.</div></div>', '2016-05-12 16:06:12', NULL, 'bookmark', 'member3');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit_time` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `post_id`, `content`, `created_time`, `last_edit_time`, `username`) VALUES
(1, 2, '<i>Fusce lobortis bibendum metus nec scelerisque. Curabitur convallis dolor quis erat maximus viverra. Sed id nibh tempor magna eleifend aliquet. Sed vel nibh lacus. Ut et feugiat mauris. Proin a mattis justo, non fermentum urna. Sed eget tortor fermentum, placerat justo a, consectetur lacus.</i>', '2016-05-11 05:41:06', '2016-05-12 02:45:36', 'mod'),
(2, 2, 'Etiam finibus erat neque, non maximus tortor malesuada ac. In id velit a nunc feugiat hendrerit ac nec elit. Mauris vel sollicitudin risus. Proin scelerisque laoreet mauris, vitae convallis lorem sodales sed. Sed condimentum convallis condimentum. Proin odio diam, laoreet id odio non, placerat tristique purus. Donec venenatis sollicitudin volutpat.', '2016-05-11 05:41:38', '2016-05-11 13:40:00', 'admin'),
(3, 2, 'Sed condimentum convallis condimentum. Proin odio diam, laoreet id odio non, placerat tristique purus. Donec venenatis sollicitudin volutpat.', '2016-05-11 12:31:41', '2016-05-12 02:42:11', 'member2'),
(4, 2, '<b>Fusce lobortis bibendum metus nec scelerisque.</b> <div><br></div><div><i>Curabitur convallis dolor quis erat maximus viverra.</i> </div><div>Sed id nibh tempor magna eleifend aliquet. Sed vel nibh lacus. Ut et feugiat mauris. Proin a mattis justo, non fermentum urna. Sed eget tortor fermentum, placerat justo a, consectetur lacus.</div>', '2016-05-12 06:52:23', '2016-05-12 02:47:04', 'member'),
(5, 2, '<font face="Courier New">Proin a mattis justo, non fermentum urna. Sed eget tortor fermentum, placerat justo a, consectetur lacus.</font>', '2016-05-12 06:55:28', '2016-05-12 02:47:28', 'member'),
(6, 2, 'Etiam finibus erat neque, non maximus tortor malesuada ac. In id velit a nunc feugiat hendrerit ac nec elit. Mauris vel sollicitudin risus. Proin scelerisque laoreet mauris, vitae convallis lorem sodales sed. Sed condimentum convallis condimentum. Proin odio diam, laoreet id odio non, placerat tristique purus. Donec venenatis sollicitudin volutpat.', '2016-05-12 07:00:38', NULL, 'member'),
(18, 11, '<h1><i><b>vừa to vừa đậm vừa nghiêng</b></i></h1>', '2016-05-12 14:12:26', '2016-05-12 10:17:29', 'admin'),
(20, 11, '<h1><i><font face="Times New Roman">Times New Roman</font></i></h1>', '2016-05-12 14:13:47', '2016-05-12 10:17:59', 'member'),
(21, 11, '<h1><font face="Lucida Console">int main() {<br></font><font face="Lucida Console">  cout << "Hello world";<br></font><font face="Lucida Console">  return 0;<br></font><font face="Lucida Console">}</font></h1>', '2016-05-12 14:13:54', '2016-05-12 10:19:42', 'member'),
(22, 11, '<h2>5555555555555555555555555555555</h2>', '2016-05-12 14:14:05', NULL, 'member'),
(23, 11, '<h4>22222222222222222</h4>', '2016-05-12 14:16:58', NULL, 'member'),
(24, 11, 'Morbi sit amet ornare libero. Curabitur mollis eros id tempor tincidunt. Sed in porta augue posuere.', '2016-05-12 15:33:24', NULL, 'admin'),
(25, 11, 'Aenean lacinia sodales sapien, eu condimentum tortor tincidunt ut. Praesent sed ligula id quam amet.', '2016-05-12 15:34:34', NULL, 'admin'),
(26, 3, '<h2><b><font face="Palatino Linotype">Ý nghĩa</font></b></h2><p><font face="Arial">Bình Ngô đại cáo là tác phẩm văn học chức năng hành chính quan trọng không chỉ đối với lịch sử dân tộc Việt Nam mà còn có ý nghĩa quan trọng đối với tiến trình phát triển văn học sử Việt Nam. Trong tác phẩm này, tác giả đã kết hợp một cách uyển chuyển giữa tính chân xác lịch sử với chất sử thi anh hùng ca qua lối văn biền ngẫu mẫu mực của một ngọn bút tài hoa uyên thâm Hán học. Chính vì thế, Bình Ngô đại cáo đã trở thành tác phẩm cổ điển sớm đi vào sách Giáo khoa từ Phổ thông cơ sở đến Phổ thông trung học và được giảng dạy ở tất cả các trường Cao đẳng, Đại học ngành khoa học xã hội - nhân văn ở Việt Nam.</font></p>', '2016-05-12 15:59:16', NULL, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_topic_id` int(11) DEFAULT NULL,
  `topic_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '6',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `icon_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'th',
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `parent_topic_id`, `topic_title`, `level`, `description`, `created_time`, `icon_name`) VALUES
(1, NULL, 'Văn học', 6, 'Donec non ligula arcu. Maecenas ac tempus quam. Vestibulum convallis ullamcorper dui et porta. Vestibulum ullamcorper, ipsum non commodo gravida, metus elit ultrices nulla, in molestie velit nunc id velit. Suspendisse sem nunc, faucibus et laoreet nullam.', '2016-05-11 04:57:12', 'book'),
(2, NULL, 'Góc Học Tập', 6, 'Quisque ut velit sed nisl rutrum hendrerit. Cras quis velit pellentesque arcu venenatis tincidunt eget eget leo. Phasellus non erat metus. Proin non dignissim lorem. Phasellus quis eros elementum massa tincidunt tristique. Etiam aliquam, dolor non nullam.', '2016-05-11 07:14:53', 'pencil'),
(3, NULL, 'Thể thao', 6, 'Sed iaculis cursus ipsum, sit amet euismod ante condimentum id. Mauris vulputate mauris libero, sed dictum lectus imperdiet a. Curabitur convallis quam neque, in semper nulla porta ut. Suspendisse malesuada sit amet ipsum non ultrices. Vivamus massa nunc.', '2016-05-11 07:18:48', 'tower'),
(4, 3, 'Bóng đá', 6, 'Vivamus vestibulum sagittis urna, in malesuada felis posuere sed. Sed vitae odio at ex pellentesque sollicitudin sit amet sed tortor. In faucibus fermentum semper. Donec lobortis congue ligula, eget pretium lorem posuere eget. Etiam luctus metus leo amet.', '2016-05-11 07:21:17', 'globe'),
(5, 3, 'Cờ vua', 6, 'Nulla ut tincidunt turpis, ornare lobortis nulla. Curabitur ultrices nunc vel est mollis, ut dapibus elit consequat. Nullam elementum massa pulvinar risus varius luctus. Sed blandit eget sem sed sagittis. Etiam pharetra turpis ut sapien rutrum massa nunc.', '2016-05-11 07:25:24', 'knight'),
(6, 2, 'Toán', 6, 'Integer ante neque, ullamcorper sed blandit eget, hendrerit a metus. Vestibulum tincidunt, ex id rutrum luctus, nibh mauris luctus arcu, et iaculis velit leo ut ipsum. Praesent accumsan in sapien at bibendum. Praesent in nisl at urna hendrerit aliquam id.', '2016-05-11 07:50:34', 'random'),
(7, 2, 'Hóa', 6, 'Integer ante neque, ullamcorper sed blandit eget, hendrerit a metus. Vestibulum tincidunt, ex id rutrum luctus, nibh mauris luctus arcu, et iaculis velit leo ut ipsum. Praesent accumsan in sapien at bibendum. Praesent in nisl at urna hendrerit aliquam id.', '2016-05-11 07:51:46', 'glass'),
(8, 2, 'Lý', 6, 'Integer ante neque, ullamcorper sed blandit eget, hendrerit a metus. Vestibulum tincidunt, ex id rutrum luctus, nibh mauris luctus arcu, et iaculis velit leo ut ipsum. Praesent accumsan in sapien at bibendum. Praesent in nisl at urna hendrerit aliquam id.', '2016-05-11 07:52:19', 'magnet'),
(9, 1, 'Văn Học Việt Nam', 6, 'Integer ante neque, ullamcorper sed blandit eget, hendrerit a metus. Vestibulum tincidunt, ex id rutrum luctus, nibh mauris luctus arcu, et iaculis velit leo ut ipsum. Praesent accumsan in sapien at bibendum. Praesent in nisl at urna hendrerit aliquam id.', '2016-05-11 07:53:47', 'tags'),
(10, 1, 'Văn Học Nước Ngoài', 6, 'Integer ante neque, ullamcorper sed blandit eget, hendrerit a metus. Vestibulum tincidunt, ex id rutrum luctus, nibh mauris luctus arcu, et iaculis velit leo ut ipsum. Praesent accumsan in sapien at bibendum. Praesent in nisl at urna hendrerit aliquam id.', '2016-05-11 07:54:26', 'tags'),
(11, 9, 'Văn học cận đại', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tellus lacus, vestibulum a vulputate at, auctor facilisis metus. Maecenas tempus sem nec metus egestas, a suscipit mauris rhoncus. Nulla gravida risus vitae enim feugiat aliquet. Mauris sed.', '2016-05-12 04:56:06', 'tags'),
(12, 9, 'Văn học hiện đại', 6, 'Sed magna mauris, convallis ac elit eu, suscipit rutrum urna. Nunc fermentum, ex et vehicula aliquam, mi tortor tempus risus, vitae pulvinar nisl purus fermentum leo. Vivamus lobortis laoreet neque a faucibus. Cras at tincidunt ante. Praesent lacus metus.', '2016-05-12 05:26:54', 'th');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '4',
  `full_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_blocked` bit(1) NOT NULL DEFAULT b'0',
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login_time` timestamp NULL DEFAULT NULL,
  `avatar_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'images/member_96px.png',
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `level`, `full_name`, `email`, `is_blocked`, `created_time`, `last_login_time`, `avatar_url`) VALUES
('admin', 'admin', 0, 'Administrator', 'admin@miniforum.com', '0', '2016-05-11 03:47:40', '2016-05-12 11:08:56', 'images/administrator_96px.png'),
('member', 'member', 4, 'Member', 'member@miniforum.com', '0', '2016-05-11 03:49:03', '2016-05-12 11:00:18', 'images/member_96px.png'),
('member2', 'member2', 4, 'Member No.2', 'member2@miniforum.com', '0', '2016-05-11 10:06:30', '2016-05-12 02:31:36', 'images/member_96px.png'),
('member3', 'member3', 4, 'Thành viên số 3', 'member3@forummini.com', '0', '2016-05-12 08:11:07', '2016-05-12 11:04:27', 'images/member_96px.png'),
('mod', 'mod', 2, 'Moderator', 'mod@miniforum.com', '0', '2016-05-11 03:48:26', '2016-05-12 10:37:00', 'images/moderator_96px.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
