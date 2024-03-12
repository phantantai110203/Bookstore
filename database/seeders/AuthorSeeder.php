<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Nhà xuất bản kim đồng',
            'DateOfBirth'=>'1957-10-20',
            'InfoAuthor' => 'Nhà xuất bản Kim Đồng là một nhà xuất bản lớn tại Việt Nam, chuyên xuất bản các sách dành cho trẻ em và tuổi mới lớn. Ngày thành lập của nhà xuất bản Kim Đồng là ngày 20 tháng 10 năm 1957. Nhà xuất bản Kim Đồng đã và đang đóng góp quan trọng trong việc phát triển văn học thiếu nhi và góp phần nuôi dưỡng tình yêu đọc sách cho thế hệ trẻ Việt Nam.',
        ]);
        Author::create([

            'name' => 'Fujiko F. Fujio',
            'DateOfBirth'=>'1933-12-01',
            'InfoAuthor' => 'Tác giả của truyện Doraemon là Fujiko F. Fujio. Fujiko F. Fujio là bút danh chung của hai tác giả người Nhật Bản là Hiroshi Fujimoto (1933-1996). Cả hai tác giả đã hợp tác để tạo ra loạt truyện tranh nổi tiếng Doraemon.',
        ]);
        Author::create([

            'name' => ' Trần Thanh Phong',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Trần Thanh Phong cái tên không còn quá xa lạ với lĩnh vực kinh doanh. Anh là ông chủ của một chuỗi cửa hàng thời trang Bingo với hơn 10 năm lăn lộn trong ngành bán lẻ, xây dựng hàng trăm shop thời trang bán lẻ.',
        ]);
        Author::create([

            'name' => 'Amy Odell',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Tác giả cuốn sách - Amy Odell - là một cựu biên tập viên thời trang. Tác phẩm viết về giới blogger, nhân vật tạo trend, nhà thiết kế, người nổi tiếng, biên tập viên và người mẫu… tất đều dưới góc nhìn thú vị, hài hước, khác với truyền thông tô vẽ.',
        ]);
        Author::create([
            'name' => 'Lý Thành Cơ',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Đang cập nhật',
        ]);
        Author::create([
            'name' => 'Nhiều tác giả',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Đang cập nhật',
        ]);
        Author::create([
            'name' => 'Vãn Tình',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Vân Tình là một nhà văn nổi tiếng người Trung Quốc. Mặc dù vậy, những thông tin cá nhân của cô vẫn luôn là ẩn số. Sinh ra tại Trung Quốc, nơi mà nên văn học rất phát triển với hàng loạt tác phẩm ngôn tinh đình đám, những tiểu thuyết văn học kinh điển, nhưng Văn Tình vẫn có được chỗ đứng vững chắc, tỏa sáng như những ngôi sao giữa lang văn nhờ những tác phẩm hay, chất lượng.',
        ]);
        Author::create([
            'name' => 'Edmondo De Amicis',
            'DateOfBirth'=>'1886-10-18',
            'InfoAuthor' => 'Edmondo De Amicis được sinh ra tại Oneglia, thành phố biển Imperia của xứ Liguria, Italia. Khi trưởng thành, ông vào trường quân đội của Modena và trở thành sĩ quan quân đội Ý. Ông đã tham gia chiến dầu dành Custoza trong cuộc chiến giành độc lập lần thứ 3 của quân đội Italia chống lại để quốc Áo.',
        ]);
        Author::create([
            'name' => 'Nguyễn Nhật Ánh',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Nhà văn Nguyễn Nhật Ánh được biết đến qua nhiều tác phẩm văn học về đề tài tuổi mới lớn. Cốt truyện đơn giản, tình cảm trong sáng, cảnh đẹp làng quê là những nét đặc trưng trong các truyện ngắn của Nguyễn Nhật Ánh. Ngoài Tôi thấy hoa vàng trên cỏ xanh, truyện ngắn Mắt Biếc và Cô gái đến từ hôm qua của bác đều đã được chuyển thể thành phim và mang lại tiếng vang lớn.t',
        ]);
        Author::create([
            'name' => 'Napoleon Hill',
            'DateOfBirth'=>'1883-10-26',
            'InfoAuthor' => 'Napoleon Hill (sinh ngày 26 tháng 10 năm 1883 – mất ngày 8 tháng 11 năm 1970) là một tác giả người Mỹ, một trong những người sáng lập nên một thể loại văn học hiện đại đó là môn “thành công học” (là khoa học về sự thành công của cá nhân).',
        ]);
        Author::create([
            'name' => 'Melanie Barnes',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Melanie Barnes được biết đến với vai trò là nhà văn và nhiếp ảnh gia. Cô làm việc tại blog Geoffrey and Grace và trang Instagram @geoffreyandgrace – Điểm đến cho cảm hứng sống chậm và sống tối giản.',
        ]);
        Author::create([
            'name' => 'Dale Carnegie',
            'DateOfBirth'=>'1888-11-24',
            'InfoAuthor' => 'Dale Carnegie tên đầy đủ là Dale Breckenridge Carnegie sinh năm 1888 tại Maryville, Missouri của nước Mỹ. Gia đình ông làm nghề nông chính vì vậy cuộc sống thời thơ ấu của tác giả đều gắn liền với những buổi sáng dậy sớm vắt sữa bò, và làm việc phụ gia đình. Ông tốt nghiệp trường State Teacher’s College tại Warrensburg. Và sau đó đã làm rất nhiều những công việc khác nhau để kiếm sống. Dale Carnegie mất vào ngày 1 tháng 11 năm 1955 vì căn bệnh Hodgkin tại Forest Hills, New York, và được hỏa thiêu tại nghĩa trang quê nhà Belton, Cass County, Missouri.',
        ]);
        Author::create([
            'name' => 'Trác Nhã',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Khéo ăn khéo nói sẽ có được thiên hạ thấm và chạm đến biết bao thế hệ độc giả bởi nó được viết bởi tác giả Trác Nhã – nhà văn người Trung Quốc với văn phong mượt mà, nhẹ nhàng mà rất thú vị, sâu sắc.',
        ]);
        Author::create([
            'name' => 'Thích Nhất Hạnh',
            'DateOfBirth'=>'1926-10-11',
            'InfoAuthor' => 'Thích Nhất Hạnh (tên khai sinh Nguyễn Xuân Bảo, sinh ngày 11 tháng 10 năm 1926) là một thiền sư, giảng viên, nhà văn, nhà thơ, nhà khảo cứu, nhà hoạt động xã hội, và người vận động cho hòa bình người Việt Nam.Ông sinh ra ở Thừa Thiên-Huế, miền Trung Việt Nam, xuất gia theo Thiền tông vào năm 16 tuổi, trở thành một nhà sư vào năm 1949.',
        ]);
        Author::create([
            'name' => 'Studio Ponoc',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Studio Ponoc là hãng phim hoạt hình Nhật vừa mới thành lập vào năm 2015 có trụ sở đặt tại Musashino, Tokyo. Giám đốc hãng là Yoshiaki Nishimura, nhà sản xuất kỳ cựu của Studio Ghibli, người từng nhận hai đề cử Oscar liên tiếp cho The Tale of Princess Kaguya và When Marnie Was There.',
        ]);
        Author::create([
            'name' => 'Oded Galor',
            'DateOfBirth'=>null,
            'InfoAuthor' => '“Hành trình nhân loại: Nguồn gốc của thịnh vượng và bất bình đẳng” được viết bởi Oded Galor – một trong những nhà kinh tế có ảnh hưởng nhất trong lĩnh vực tăng trưởng và phát triển. Ông được đánh giá là một ứng cử viên danh giá cho giải Nobel Kinh tế và là một trong những bộ óc xuất chúng của thế kỷ 21. ',
        ]);
        Author::create([
            'name' => 'Logan Ury',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Sau khi tốt nghiệp ngành Tâm lý học tại Harvard, Logan Ury điều hành nhóm nghiên cứu về khoa học hành vi tại Google. Cô cũng là người đứng sau chương trình trò chuyện nổi tiếng Talks at Google: Modern Romance. Hiện tại, cô đang là Giám đốc về Khoa học Mối quan hệ của ứng dụng Hinge.',
        ]);
        Author::create([
            'name' => 'William O’Neil',
            'DateOfBirth'=>'1933-03-25',
            'InfoAuthor' => 'William J. O’Neil (sinh ngày 25 tháng 3 năm 1933) là một doanh nhân, nhà môi giới chứng khoán và nhà văn người Mỹ, người đã thành lập công ty môi giới chứng khoán William O’Neil & Co. Inc vào năm 1963 và tờ báo kinh doanh Investor’s Business Daily năm 1984. Ông là tác giả của các cuốn sách Làm giàu từ chứng khoán, 24 bài học cần thiết để đầu tư thành công và Nhà đầu tư thành công cùng nhiều cuốn sách khác, và là tác giả của chiến lược đầu tư CAN SLIM.',
        ]);
        Author::create([
            'name' => 'Vạn Lý Độc Hành',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Tác giả Đỗ Hoàng Dương (ông lấy bút danh Vạn Lý Độc Hành vì rất đam mê đi du lịch), là doanh nhân nên việc viết tiểu thuyết dài 49 ngàn chữ, đã là một nỗ lực sáng tạo đáng quý. Khi thưởng thức tác phẩm đầu tay (NXB Hội Nhà văn) của ông, bạn đọc có nhiều bất ngờ thú vị bởi sự miêu tả tinh tế về “mảnh đất tình quê” thân thương; những hoài niệm tuổi thơ, tình bạn học trò mà “ai cũng thấy bóng dáng mình trong đó”; những rung động đầu đời thơ mộng cùng “tình yêu tự nguyện” bồng bột, dại khờ song ngọt ngào và khó quên.',
        ]);
        Author::create([
            'name' => 'Emanuel James Rohn',
            'DateOfBirth'=>'1930-06-17',
            'InfoAuthor' => 'Emanuel James Rohn, Emanuel James "Jim" Rohn sinh ra ở Yakima, Washington. Ông là con một trong gia đình. Cha mẹ ông là Emmanuel và Clara Rohn. Gia đình Rohn sở hữu một trang trại tại Caldwell, Idaho. Rohn rời trường đại học chỉ sau một năm học và bắt đầu sự nghiệp bằng công việc quản lý nhân sự cho cửa hàng bách hóa Sears. Vào khoảng thời gian này, một người bạn đã mời ông đến tham dự một buổi thuyết trình của doanh nhân nổi tiếng John Earl Shoaff.',
        ]);
        Author::create([
            'name' => 'Cảnh Thiên',
            'DateOfBirth'=>null,
            'InfoAuthor' => ' Cảnh Thiên là tác giả của cuốn sách Đừng lựa chọn an nhàn khi còn trẻ và nhiều loại sách khác. Tuy nhiên, thông tin về tác giả cũng không được tiết lộ nhiều, các độc giả lâu năm chỉ biết tác giả Cảnh Thiên là người Trung Quốc, từng nhiều năm làm ở vị trí biên tập và truyền thông, cung Sư Tử, thích văn chương, mỹ thực và những nỗi niềm hạnh phúc nho nhỏ, những câu chuyện vui buồn thực tế đã và đang xảy ra trong cuộc sống.',
        ]);
        Author::create([
            'name' => 'Alan Loy McGinnis',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Alan Loy McGinnis là một tác giả, nhà trị liệu tâm lý Cơ đốc, đồng thời là người sáng lập và giám đốc của Trung tâm Tư vấn Thung lũng ở Glendale, California, Hoa Kỳ. Ông là mục sư của nhà thờ Grandview Presbyterian vào khoảng năm 1970. Ngày nay có hơn 3 triệu bản sách của ông được in',
        ]);
        Author::create([
            'name' => 'Taketoshi Ozawa',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Tác giả Taketoshi Ozawa nguyên là viện trưởng trung tâm chăm sóc sức khỏe bệnh viện Yokohama Kousei, người sáng lập Hiệp hội Endlife Care – tổ chức chuyên đào tạo y tá, hộ sỹ tại Nhật Bản. Là bác sỹ, ông đã tận tay chăm sóc sức khỏe cho hơn 2.800 bệnh nhân, trong đó có phương pháp “Dignity Therapy” để mỗi người bệnh vượt lên nỗi đau thể xác, tinh thần và tìm ra ý nghĩa của cuộc đời mình. Đó là liệu pháp tôn trọng phẩm cách bệnh nhân, với mục đích là tác động tới tâm lý xã hội và giúp bệnh nhân cởi bỏ những phiền não về sự tồn tại, giá trị tồn tại của bản thân.',
        ]);
        Author::create([
            'name' => 'Pam Grout',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Pam Grout là một người phụ nữ thành công với cuộc sống rực rỡ sắc màu, và tình yêu thương vô tận dành cho cô con gái nhỏ. Cô và sách của cô rất đáng để bạn đọc phải suy ngẫm. Eccthai cùng bạn tìm hiểu nữ văn sĩ này. Amazon giới thiệu: Pam Grout  là một người lãng mạn vô vọng, người vẫn tin rằng thế giới là một nơi tuyệt đẹp, rằng con người cao quý và bất cứ điều gì đều có thể.',
        ]);
        Author::create([
            'name' => 'Brian bartes',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Brian bartes là một trong những tác giả sở hữu rất nhiều quyển sách thuộc top “best seller”. Và khi quyển sách Bài học cuộc sống được chính thức xuất bản cũng đã nhận được rất nhiều phản hồi tích cực từ đọc giả. Với những chủ đề về cuộc sống, Brian Bartes đã thực sự chinh phục được đọc giả bởi bản thân ông đã dành rất nhiều thời gian cho việc nghiên cứu.',
        ]);
        Author::create([
            'name' => 'Eckhart Tolle ',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Eckhart Tolle (sinh năm 1948 ở Đức) là một nhà tâm linh, nổi tiếng nhất với vai trò tác giả cuốn sách Sức Mạnh Của Hiện Tại và Thức Tỉnh Mục Đích Sống. Năm 2011, ông được nhà sách Watkins Books xem là người có ảnh hưởng nhất thế giới về tâm linh. Năm 2008, một bài viết của The New York Times đã gọi Tolle là “tác giả về tâm linh nổi tiếng nhất nước Mỹ”.',
        ]);
        Author::create([
            'name' => 'Nicola Yoon',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Nicola Yoon sinh năm 1972, mang quốc tịch Mỹ, gốc Jamaica, lớn lên ở Jamaica và Brooklyn, New York. Cô theo học chuyên ngành kỹ sư điện tử tại Đại học Cornell. Sau khi tốt nghiệp Yoon theo học chương trình Thạc sĩ Viết sáng tạo tại Cao đẳng Emerson.',
        ]);
        Author::create([
            'name' => 'Mèo Maverick',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Mèo Maverick là tác giả người Trung Quốc, tên thật là Triệu Tinh. Cô là tác giả của rất nhiều cuốn sách best seller, đồng thời là hot blogger trên các trang mạng xã hội nổi tiếng. Thông tin cá nhân của tác giả hiện chưa được tiết lộ nhiều.Bạn đang xem: Mèo maverick là ai',
        ]);
        Author::create([
            'name' => 'Kohata Yao',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Kohata Yao đã cùng chồng sáng lập Học viện Reiki Hatsuga, một nơi hỗ trợ phát triển tâm linh có trụ sở tại Tokyo và Osaka.
            Sau khi kết hôn, bà đã giác ngộ thế giới tâm linh và đạo pháp một cách tự nhiên, thay đổi thế giới quan của bản thân nhờ nhân duyên với bộ môn Reiki – phương pháp Healing có nguồn gốc từ xa xưa của Nhật Bản.
            Bà là tác giả của nhiều cuốn sách như Phương pháp thanh tẩy bản thân (Nhà xuất bản Kanki), Chakra (Luân xa) nhập môn (Nhà sách Nagaoka), Phương pháp thư giãn trí não (Nhà xuất bản Chukei).',
        ]);
        Author::create([
            'name' => 'Gary Keller',
            'DateOfBirth'=>'1957-07-21',
            'InfoAuthor' => 'Gary Keller là đồng sáng lập và chủ tịch Hội đồng Quản trị của Keller William Reatly International, công ty kinh doanh nhượng quyền bất động dản lớn nhất nước Mỹ. Là Doanh nhân của Năm của Earnst & Young. Ông đã từng xuất bản 3 quyển sách bán chạy nhất nước Mỹ liên quan đến bất động sản. Ngoài ra, Gary đã giúp vô số người nhận ra kết quả phi thuưường của việc chỉ tập tủng vào Sứ mệnh của họ.',
        ]);
        Author::create([
            'name' => ' Brooke Mcalary',
            'DateOfBirth'=>null,
            'InfoAuthor' => 'Đang cập nhật',
        ]);
    }
}
