<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Book::create([
                'name' => 'Sách giáo khoa địa lý 12',
                'description' => 'Sách Giáo trình Địa lý 12 (Bộ sách giáo dục Địa lý): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Địa lý theo từng chủ đề, bao gồm thông tin về địa hình, khí hậu, dân cư, kinh tế, văn hóa và môi trường của các vùng và quốc gia trên thế giới.',
                'publish_date' => null,
                'price' => 12000,
                'quality' => 86,
                'image'=>'/asset/img/h1.jpg',
                'category_id' => 3,
                'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Giáo dục công dân 12',
            'description' => 'Sách Giáo dục Công dân 12 (Bộ sách giáo dục Giáo dục công dân): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Giáo dục công dân theo các chủ đề như công dân và xã hội, công dân và quyền lợi, công dân và trách nhiệm, và công dân và pháp luật. Nó cung cấp cả lý thuyết và ví dụ thực tế để học sinh hiểu và thực hành các khái niệm và kỹ năng của Giáo dục công dân.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h3.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Toán 12(Hình học)',
            'description' => 'Sách Giáo trình Toán học 12 (Bộ sách giáo dục Toán học): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Hình học theo các phần như hình học không gian, hình học đường thẳng, hình học bề mặt, hình học không gian và các hình học khác.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h2.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Sinh học 12',
            'description' => 'Sách Giáo trình Sinh học 12 (Bộ sách giáo dục Sinh học): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Sinh học theo các phần như cấu tạo và chức năng của tế bào, di truyền học, sinh sản, di truyền và tiến hóa, sinh học động vật, sinh học thực vật, sinh học vi khuẩn và vi sinh vật.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h4.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Tiếng Anh 12',
            'description' => 'Sách Giáo trình Tiếng Anh 12 (Bộ sách giáo dục Tiếng Anh): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Tiếng Anh theo các chủ đề như ngữ pháp, từ vựng, kỹ năng nghe, nói, đọc và viết. Nó cung cấp cả lý thuyết và các bài tập để học sinh rèn kỹ năng Tiếng Anh của mình.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h5.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Toán học 12(giải tích)',
            'description' => 'Sách Giáo trình Toán học 12 (Bộ sách giáo dục Toán học): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Giải tích theo các phần như hàm số, giới hạn và liên tục, đạo hàm và ứng dụng, tích phân và ứng dụng, phương trình vi phân và ứng dụng, và các chủ đề liên quan khác. Nó cung cấp cả lý thuyết và ví dụ, bài tập để học sinh rèn kỹ năng Giải tích.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h7.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Công nghệ 12 ',
            'description' => 'SSách Giáo trình Công nghệ 12 (Bộ sách giáo dục Công nghệ): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Công nghệ theo các phần như công nghệ thông tin, công nghệ chế tạo, công nghệ nông nghiệp và công nghệ thực phẩm. Nó cung cấp cả lý thuyết và ví dụ, bài tập để học sinh hiểu và áp dụng kiến thức Công nghệ.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h8.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Vật lý 12',
            'description' => 'Sách Giáo trình Vật lý 12 (Bộ sách giáo dục Vật lý): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Vật lý theo các phần như cơ học, nhiệt động học, điện từ học và quang học. Nó cung cấp cả lý thuyết và ví dụ, bài tập để học sinh hiểu và áp dụng kiến thức Vật lý.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h9.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Tin học 12',
            'description' => 'Sách Giáo trình Tin học 12 (Bộ sách giáo dục Tin học): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Tin học theo các phần như lập trình, cơ sở dữ liệu, mạng máy tính và thiết kế web. Nó cung cấp cả lý thuyết và ví dụ, bài tập để học sinh hiểu và áp dụng kiến thức Tin học.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h10.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Sách giáo khoa Lịch sử 12',
            'description' => 'Sách Giáo trình Lịch sử 12 (Bộ sách giáo dục Lịch sử): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Lịch sử theo các phần như Lịch sử thế giới hiện đại, Lịch sử Việt Nam từ 1858 đến 1945, Lịch sử Đông Nam Á và Lịch sử thế giới hiện đại từ năm 1945 đến nay. Nó cung cấp cả lý thuyết và thông tin chi tiết về các sự kiện, nhân vật và quá trình lịch sử.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h6.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Từ điển pháp luật việt nam',
            'description' => 'Sách Giáo trình Lịch sử 12 (Bộ sách giáo dục Lịch sử): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Lịch sử theo các phần như Lịch sử thế giới hiện đại, Lịch sử Việt Nam từ 1858 đến 1945, Lịch sử Đông Nam Á và Lịch sử thế giới hiện đại từ năm 1945 đến nay. Nó cung cấp cả lý thuyết và thông tin chi tiết về các sự kiện, nhân vật và quá trình lịch sử.',
            'publish_date' => null,
            'price' => 12000,
            'quality' => 86,
            'image'=>'/asset/img/h11.jpg',
            'category_id' => 3,
            'author_id' => 1,
        ]);
        Book::create([
            'name' => 'Nobita và cuộc chiến vũ trụ',
            'description' => 'Sách Giáo trình Lịch sử 12 (Bộ sách giáo dục Lịch sử): Đây là sách giáo trình chính thức theo chương trình giảng dạy của Bộ Giáo dục và Đào tạo Việt Nam. Sách này cung cấp kiến thức về Lịch sử theo các phần như Lịch sử thế giới hiện đại, Lịch sử Việt Nam từ 1858 đến 1945, Lịch sử Đông Nam Á và Lịch sử thế giới hiện đại từ năm 1945 đến nay. Nó cung cấp cả lý thuyết và thông tin chi tiết về các sự kiện, nhân vật và quá trình lịch sử.',
            'publish_date' => '1985-03-16',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h12.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'Nobita du hành biển phương nam',
            'description' => 'Đây là tác phẩm thứ 19 trong loạt phim hoạt hình "Doraemon" rất được yêu thích của tác giả Fujiko.F.Fujio, được công chiếu vào mùa xuân năm 1998. Vô tình nhặt được bản đồ kho báu, Nobita đã phát hiện ra đảo châu báu. Nhóm bạn dùng bảo bối của Doraemon, giong thuyền nhắm thẳng hướng đại dương bao la. Nhưng do biến cố của siêu không gian, mọi người đã bị lạc vào thời đại hải tặc...!?',
            'publish_date' => '1998-03-07',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h13.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'Nobita tây du ký',
            'description' => 'Nobita Tây Du Ký" (hoặc còn được gọi là "Journey to the West with Nobita") là một phiên bản đặc biệt của loạt truyện tranh Doraemon của tác giả Fujiko F. Fujio. Trong câu chuyện này, các nhân vật chính là Nobita, Doraemon và nhóm bạn của Nobita bị cuốn vào một cuộc phiêu lưu kỳ diệu dựa trên truyện cổ tích Trung Quốc nổi tiếng "Tây Du Ký".',
            'publish_date' => '2012-11-20',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h14.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'Nobita và truyền thuyết vua mặt trời',
            'description' => 'Nobita và truyền thuyết vua mặt trời" (Doraemon: Nobita and the Legend of the Sun King) là một bộ phim hoạt hình Nhật Bản thuộc series Doraemon, dựa trên manga cùng tên của Fujiko F. Fujio. Bộ phim được phát hành vào năm 2000.<br/>
            Câu chuyện xoay quanh nhân vật chính là Nobita, một cậu bé bất hạnh và luôn gặp rắc rối trong cuộc sống hàng ngày. Nobita và các bạn của mình, cùng với chú mèo máy Doraemon, thời gian được gửi từ tương lai để giúp đỡ, bị cuốn vào một cuộc phiêu lưu đến xứ sở cổ đại nằm dưới lòng đại dương',
            'publish_date' => '2000-03-04',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h15.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'Nobita và những phát sư gió bí ẩn',
            'description' => 'Nobita và những phát sư gió bí ẩn" là một tập phim hoạt hình thuộc loạt phim Doraemon, được sáng tác bởi Fujiko F. Fujio. Doraemon là một bộ truyện tranh nổi tiếng của Nhật Bản với nhân vật chính là chú mèo máy Doraemon, người đã được gửi từ tương lai để giúp đỡ cậu bé Nobita.<br/>
            Trong tập phim "Nobita và những phát sư gió bí ẩn", Nobita và các bạn bị cuốn vào một cuộc phiêu lưu thú vị. Câu chuyện bắt đầu khi Nobita tìm thấy một cuốn sách cổ về những phát sư gió, và cậu và các bạn quyết định điều tra sự thật về những phát sư này.',
            'publish_date' => '2003-03-08',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h16.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'Nobita và lâu đài dưới đáy biển',
            'description' => 'Nobita và lâu đài dưới đáy biển (Doraemon: Nobitas Great Adventure in the Underwater Castle) là một bộ phim hoạt hình Nhật Bản thuộc series Doraemon, dựa trên manga cùng tên của Fujiko F. Fujio. Bộ phim được phát hành vào năm 1983.<br/>
            Câu chuyện bắt đầu khi Nobita và nhóm bạn của mình tình cờ khám phá ra một bản đồ bí ẩn cho thấy vị trí của một lâu đài cổ nằm dưới đáy biển. Với sự giúp đỡ của chú mèo máy Doraemon, họ sử dụng một thiết bị thời gian để du hành tới thời điểm lâu đài còn tồn tại.',
            'publish_date' => '1983-03-12',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h17.jpg',
            'category_id' => 2,
            'author_id' => 2,

        ]);
        Book::create([
            'name' => 'Nobita thám hiểm vùng đất mới',
            'description' => 'Nguyên mẫu Doraemon gồm 826 truyện ngắn do chính tác giả Fujiko.F.Fujio chọn lọc. Bộ truyện đã mang đến tiếng cười và gắn liền với kỷ niệm thời thơ ấu của biết bao thế hệ độc giả. Cuốn sách này tập hợp những câu chuyện vô cùng thú vị về chú mèo máy Doraemon.',
            'publish_date' => '1982-03-13',
            'price' => 30000,
            'quality' => 20,
            'image'=>'/asset/img/h20.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'NOBITA VÀ CHUYẾN DU HÀNH BIỂN PHƯƠNG NAM',
            'description' => 'Đây là tác phẩm thứ 19 trong loạt phim hoạt hình "Doraemon" rất được yêu thích của tác giả Fujiko.F.Fujio, được công chiếu vào mùa xuân năm 1998. Vô tình nhặt được bản đồ kho báu, Nobita đã phát hiện ra đảo châu báu. Nhóm bạn dùng bảo bối của Doraemon, giong thuyền nhắm thẳng hướng đại dương bao la. Nhưng do biến cố của siêu không gian, mọi người đã bị lạc vào thời đại hải tặc...!? Đây là phiên bản tranh truyện màu được vẽ lại từ tập phim hoạt hình cùng tên của tác giả Fujiko.F.Fujio.',
            'publish_date' => '1982-03-13',
            'price' => 30000,
            'quality' => 20,
            'image'=>'/asset/img/h18.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'Nobita ở vương quốc chó mèo',
            'description' => 'Truyện bắt đầu khi Nobita bắt gặp một chú chó dễ thương ở sân bóng. Cậu mang nó về nhà và đặt tên là Số Một (Ichi). Trong một đêm mưa, Nobita và Doraemon gặp một con mèo đang dầm mưa, Nobita nhận nuôi nó, đặt tên là Ướt Sũng (Zubu). Tuy nhiên rắc rối xảy ra với Nobita khi mẹ cậu nghi ngờ rằng cậu đang nuôi động vật trong nhà. Khi rắc rối đó được giải quyết bằng một cỗ máy của Doraemon thì lại có một rắc rối khác: Đó là việc các chó mèo bỏ hoang đang bị dồn lên núi vì cảnh sát đang truy nã chúng. Nobita đã đưa chúng về thời điểm 300 triệu năm trước (khi con người và khủng long chưa hề tồn tại).',
            'publish_date' => '2004-03-02',
            'price' => 30000,
            'quality' => 20,
            'image'=>'/asset/img/h19.jpg',
            'category_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'name' => 'Khởi Nghiệp Du Kích',
            'description' => 'Quyển sách dành cho người khởi nghiệp kinh doanh với số vốn ít ỏi.
            Hầu hết các doanh nhân trẻ khi chân ướt chân ráo khởi động doanh nghiệp của mình đều trong tình trạng thiếu hụt nguồn lực. Trong khi đó, đối thủ có sẵn trên thương trường thì luôn có lợi thế, kinh nghiệm và nhiều nguồn lực hơn. Để giành chiến thắng, người đến sau phải biết vận dụng những chiến thuật đặc biệt, linh hoạt, khôn ngoan và khéo léo, đúng theo tinh thần của chiến lược chiến tranh du kích.',
            'publish_date' => '2020-04-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h21.jpg',
            'category_id' => 1,
            'author_id' => 3,
        ]);
        Book::create([
            'name' => 'Nghành công nghiệp thời trang',
            'description' => 'NGÀNH CÔNG NGHIỆP THỜI TRANG sẽ cung cấp cho bạn hiểu biết về thế giới phù hoa này dưới một góc nhìn thú vị và hài hước, khác hẳn với những gì truyền thông thường tô vẽ.
            Bạn biết gì về ngành công nghiệp thời trang?
            Liệu đây có phải nơi mọi người chỉ thích mặc toàn đen vì cho rằng đây là thứ trang phục thời trang nhất?
            Hay đây là ngành công nghiệp vận hành theo cách khiến cho người tiêu dùng, nhất là phụ nữ, luôn cảm thấy bản thân mình thua kém họ cảm thấy mình quá nghèo, quá béo, quá thiếu gợi cảm, quá thiếu gu thẩm mỹ và quá tầm thường ?
            Dù đúng hay sai, những điều này vốn dĩ chỉ là thứ bạn nhìn thấy được qua truyền thông.',
            'publish_date' => '2020-04-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h22.jpg',
            'category_id' => 1,
            'author_id' => 4,
        ]);
        Book::create([
            'name' => 'Thế giới rộng lớn đừng đi một mình',
            'description' => '"Sợ thì sợ, nhưng nếu cứ sống mãi trong vùng sợ, liệu chúng ta có biết được tuổi trẻ của mình dài bao nhiêu?"
            Càng lớn, con người càng đem theo bên mình nhiều nỗi sợ. Sợ thất nghiệp, thất tình, sự nghiệp bấp bênh, không có tiết kiệm cho tuổi già, sợ bây giờ hoang phí, sau này sẽ hối hận.
            Chúng ta sợ nhiều thứ là vậy, nhưng chúng ta lại chưa bao giờ biết sợ tuổi trẻ của mình sẽ trôi đi một cách lãng phí.
            Liệu, những nỗi sợ đó là đúng hay sai, chôn vùi tuổi trẻ trong công việc, cho sự nghiệp, để những năm tháng về sau an nhàn là nên hay không nên?
            Chúng ta nào đâu biết được, vì thậm chí không ai đoán được ngày mai.
            Vậy thì có gì để mà sợ hãi cái tương lai thậm chí còn chưa xảy đến?
            Thế giới ngoài kia có rất nhiều điều tuyệt vời.',
            'publish_date' => null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h23.jpg',
            'category_id' => 1,
            'author_id' => 5,
        ]);
        Book::create([
            'name' => 'Vì Thương',
            'description' => 'Tuyển tập Vì Thương... ghi lại tâm tình của những người con khi nghĩ về đấng sinh thành, đồng thời cho thấy thêm một nét tình cảm thiêng liêng khác được bồi đắp giữa cha mẹ và con cái: Tình bạn. Vừa là tình thâm, vừa là bạn thân, những người cha, người mẹ được nhắc đến ở đây không chỉ hy sinh thầm lặng vì con cái như dòng chảy luân hồi xưa nay mà còn luôn đồng hành, kề vai sát cánh cùng con trên mọi nẻo đường...',
            'publish_date' => null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h24.jpg',
            'category_id' => 4,
            'author_id' => 6,
        ]);
        Book::create([
            'name' => 'Khí chất bao nhiêu hạnh phúc bấy nhiêu',
            'description' => '“Khí chất bao nhiêu hạnh phúc bấy nhiêu” đem đến góc nhìn mới, hướng tiếp cận khác biệt cho những người phụ nữ đang khát khao để trưởng thành và mong muốn trở nên bản lĩnh hơn trong cuộc sống. Mỗi cá nhân họ sẽ là một họa sĩ vẽ nên câu chuyện hạnh phúc của riêng mình mà không phụ thuộc vào người khác, để tự tin sánh đôi bên người bạn đời, và dù nếu chưa có, họ vẫn có thể hiên ngang vì đã chăm sóc bản thân mình thật tốt.',
            'publish_date' => '2018-08-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h25.jpg',
            'category_id' => 4,
            'author_id' => 7,
        ]);
        Book::create([
            'name' => 'Những tấm lòng cao cả',
            'description' => 'Những tấm lòng cao cả là tiểu thuyết nổi tiếng với độc giả mọi lứa tuổi trên toàn thế giới. Không chỉ là dòng nhật ký của cậu bé mười tuổi, tác phẩm còn chất chứa những bài học nhân văn xuất hiện trong đời sống thường nhật. Bằng văn phong giản dị song hành cùng ý nghĩa giáo dục sâu sắc, ngòi bút của Edmondo de Amicis đã làm rung động trái tim người đọc và để lại nhiều dư âm trong lòng.',
            'publish_date' => '1886-10-18',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h26.jpg',
            'category_id' => 4,
            'author_id' => 8,
        ]);
        Book::create([
            'name' => 'Tôi thấy hoa vàng trên cỏ xanh',
            'description' => 'Tôi thấy hoa vàng trên cỏ xanh là một tiểu thuyết dành cho thanh thiếu niên của nhà văn Nguyễn Nhật Ánh, xuất bản lần đầu tại Việt Nam vào ngày 9 tháng 12 năm 2010 bởi Nhà xuất bản Trẻ với phần tranh minh họa do Đỗ Hoàng Tường thực hiện. Đây là một trong các truyện dài của Nguyễn Nhật Ánh, ra đời sau Đảo mộng mơ và trước Lá nằm trong lá. Tác phẩm như một tập nhật ký xoay quanh cuộc sống của những đứa trẻ ở một vùng quê Việt Nam nghèo khó, nổi bật lên là thông điệp về tình anh em, tình làng nghĩa xóm và những tâm tư của tuổi mới lớn. Theo Nguyễn Nhật Ánh, đây là lần đầu tiên ông đưa vào truyện của mình những nhân vật phản diện, đặt ra vấn đề đạo đức như sự vô tâm hay cái ác.',
            'publish_date' => '2010-12-09',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h27.jpg',
            'category_id' => 4,
            'author_id' => 9,
        ]);
        Book::create([
            'name' => 'Chiến thắng con quỷ trong bạn',
            'description' => 'Được Napoleon Hill viết lần đầu vào năm 1938, cuốn sách “Chiến Thắng Con Quỷ Trong Bạn” (xuất bản năm 2011) vẫn là một bản thảo chưa bao giờ xuất bản trong hơn 70 năm. Được chỉnh sửa và chú thích nội dung bởi Sharon Lechter, người góp phần đưa tác phẩm đến gần hơn với bạn đọc, cuốn sách là một bản tóm tắt các lời khuyên chân thành về các phương pháp thành công trong cuộc sống. Giờ đây, độc giả có thể hiểu hơn về niềm tin cá nhân của Hill, những sức mạnh đang kìm hãm chúng ta có được một cuộc sống thành công và các nguyên tắc sẽ cho phép chúng ta vượt qua những sức mạnh đó.',
            'publish_date' => null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h28.jpg',
            'category_id' => 4,
            'author_id' => 10,
        ]);
        Book::create([
            'name' => 'Hạt Giống Tâm Hồn',
            'description' => 'Bộ sách Hạt giống tâm hồn này gồm những câu chuyện có giá trị vĩnh hằng của cuộc sống, những câu chuyện chân tình, giản dị từ những con người bình dị đó sẽ giúp bạn cảm nhận, tìm lại được những giá trị của bản thân và ý nghĩa cuộc sống mà ta đã băng qua quá nhanh và vô tình lãng quên.<br/>
            Ý nghĩa sâu sắc từ những câu chuyện ngắn này sẽ như một bàn tay xoa dịu tâm hồn, tiếp thêm nguồn động viên và sức mạnh giúp chúng ta có thể vượt qua những trở ngại tinh thần, những khó khăn thử thách trong cuộc sống để khẳng định mình, theo đuổi ước mơ và vươn đến những điều tốt đẹp hơn.',
            'publish_date' => '2020-11-15',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h29.jpg',
            'category_id' => 4,
            'author_id' => 7,
        ]);
        Book::create([
            'name' => 'Sống chậm',
            'description' => 'Trong cuốn sách Sống Chậm, tác giả Melanie Barnes giới thiệu đến chúng ta lối sống chậm rãi. Cuốn sách giống như một bản tóm tắt chi tiết về cách sống chậm.
            Sống chậm là gì?
            Sống chậm có ý nghĩa gì?
            Những thách thức của thời đại lên lối sống này.
            Sau cùng, tác giả sẽ có những hướng dẫn ngắn gọn, cực kỳ hiệu quả để chúng ta có thể sống chậm mỗi ngày. Bạn hoàn toàn có thể thực hành ngay tại nhà, trong từng việc bạn làm, mà không cần đến một chuyên gia nào.',
            'publish_date' =>null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h30.jpg',
            'category_id' => 4,
            'author_id' => 11,
        ]);
        Book::create([
            'name' => 'Đắc nhân tâm',
            'description' => 'Đắc nhân tâm (Được lòng người), tên tiếng Anh là How to Win Friends and Influence People là một quyển sách nhằm tự giúp bản thân (self-help) bán chạy nhất từ trước đến nay. Quyển sách này do Dale Carnegie viết và đã được xuất bản lần đầu vào năm 1936, nó đã được bán 15 triệu bản trên khắp thế giới. Nó cũng là quyển sách bán chạy nhất của New York Times trong 10 năm. Tác phẩm được đánh giá là cuốn sách đầu tiên và hay nhất trong thể loại này, có ảnh hưởng thay đổi cuộc đời đối với hàng triệu người trên thế giới.',
            'publish_date' => '2020-11-15',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h31.jpg',
            'category_id' => 4,
            'author_id' => 12,
        ]);
        Book::create([
            'name' => 'Khéo ăn nói sẽ được lòng thiên hạ',
            'description' => 'Xã hội hiện đại, từ xin việc đến thăng chức, từ tình yêu đến hôn nhân, từ giao lưu đến hợp tác… không việc gì không cần tài ăn nói.
            Khéo ăn nói giống như sở hữu loại “dầu bôi trơn” đảm bảo các mối quan hệ của bạn “vận hành” trơn tru. Không khéo ăn nói, gặp chuyện nhỏ mắc trở ngại, gặp chuyện lớn vấp thất bại.
            Làm thế nào để nói năng trôi chảy? Làm thế nào để nói lời “đi vào lòng người”? Trong những dịp khác nhau, với những người khác nhau, ở những tình huống không giống nhau… có cuốn sách này gợi ý, bạn sẽ thành người khéo ăn nói.',
            'publish_date' => '2014-09-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h32.jpg',
            'category_id' => 4,
            'author_id' => 13,
        ]);
        Book::create([
            'name' => 'Giận',
            'description' => 'Cuốn sách “Giận” gồm 11 phần và những bài thiền tập hướng dẫn chúng ta buông bỏ sân hận, dập tắt lửa giận, tiếng nói của yêu thương chân thật,…<br/>
            Ngôn từ gẫn gũi, nhẹ nhàng và dễ đi sâu vào lòng người,.. cuốn sách “Giận” luôn nhận được sự phản hồi tích cực bởi những phương thức mà tác giả đưa ra trong sách khiến độc giả nhận ra rất nhiều bài học từ sự chữa lành hiệu quả.<br/>
            Không phải ngẫu nhiên mà cuốn sách “Giận” được bán chạy ở Hoa Kỳ - 50.000 bản mỗi tuần, trong vòng 9 tháng kể từ ngày sách được xuất bản. Tại Hàn Quốc, sách cũng bán được 1 triệu bản trong vòng 11 tháng.<br/>
            Đọc sách của Thiền sư Thích Nhất Hạnh, bạn đọc dần sẽ giác ngộ và sống đơn giản và trọn vẹn hơn.<br/>',
            'publish_date' => '2001-09-10',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h33.jpg',
            'category_id' => 4,
            'author_id' => 14,
        ]);
        Book::create([
            'name' => 'Hành Trình Nhân Loại',
            'description' => '“Hành trình nhân loại: Nguồn gốc của thịnh vượng và bất bình đẳng” được viết bởi Oded Galor – một trong những nhà kinh tế có ảnh hưởng nhất trong lĩnh vực tăng trưởng và phát triển. Ông được đánh giá là một ứng cử viên danh giá cho giải Nobel Kinh tế và là một trong những bộ óc xuất chúng của thế kỷ 21.<br/>
            Kể từ khi xuất bản đầu tiên bằng tiếng Hebrew năm 2020, cuốn sách ngay lập tức trở thành tác phẩm bán chạy nhất tại Israel. Và chỉ trong vòng 3 tháng, tác phẩm đã bán được bản quyền cho hơn 20 quốc gia và 30 vùng lãnh thổ trên thế giới. Việt Nam chính thức là ngôn ngữ thứ 30 mua bản quyền của cuốn sách này, từ bản tiếng Anh có cập nhật và chỉnh sửa.',
            'publish_date' => null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h35.jpg',
            'category_id' => 4,
            'author_id' => 16,
        ]);
        Book::create([
            'name' => 'Tâm lý học giải mã tình yêu',
            'description' => 'Có thể bạn nghĩ rằng mình không nhất thiết phải mua một cuốn sách dạy về tình yêu, bởi yêu là một phản ứng hoá học bất ngờ, chứ không phải một quyết định được tính toán trước. Thế nhưng, bạn đã nhầm! Cảm xúc yêu đương có thể đến từ bản năng tự nhiên nhưng việc hẹn hò thì không như vậy. Bạn không thể gặp một ai đó và biết ngay họ là người bạn đời phù hợp với mình. Những mối quan hệ tuyệt vời là đỉnh cao của một loạt các quyết định: hẹn hò với ai, làm thế nào để kết thúc mối quan hệ khi gặp sai người và khi nào thì cam kết với đúng người,… Nhưng đôi khi chính bộ não của chúng ta lại gây cản trở bằng cách đưa ra những quyết định sai lầm, dẫn đến việc hành trình tìm kiếm tình yêu dài lâu trở nên khó khăn.',
            'publish_date' => '2022-11-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h36.jpg',
            'category_id' => 4,
            'author_id' => 17,
        ]);
        Book::create([
            'name' => 'Gió thổi mùa trằng',
            'description' => 'Chính là đôi lời giới thiệu về quyển sách Gió Thổi Mùa Trăng Năm Ấy – được xuất bản lần đầu tiên bởi những giấc mơ thôi thúc tác giả Vạn Lý Độc Hành ( Đỗ Nguyễn Hoàng Dương ), khi nói rằng: “mình chỉ viết ra để giải tỏa những câu chuyện chất chứa trong lòng bấy lâu. Các nhân vật cứ nói chuyện với nhau trong bữa ăn giấc ngủ của mình, nên mình phải viết nó ra. Chỉ đơn giản là như vậy, chứ mình không có ý định dấn thân vào con đường văn chương.”',
            'publish_date' => null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h38.jpg',
            'category_id' => 4,
            'author_id' => 19,
        ]);
        Book::create([
            'name' => 'Chìa khóa thành công',
            'description' => 'Trước khi “diễn đạt những ý tưởng cũ theo những cách mới” từ người thầy của mình, tác giả mong muốn bạn trang bị cho mình một “hệ thống chỉ dẫn” tốt bao gồm nhiều yếu tố. Thứ nhất là triết lí dùng suy nghĩ để căng buồm định hướng cho bản thân, không chờ đợi một hướng gió hay đổ lỗi cho những tác nhân bên ngoài, tất cả xuất phát từ chính bạn.',
            'publish_date' => null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h39.jpg',
            'category_id' => 4,
            'author_id' => 20,
        ]);
        Book::create([
            'name' => 'Đừng lựa chọn an nhàn khi còn trẻ',
            'description' => 'Cuốn sách "Đừng lựa chọn an nhàn khi còn trẻ” được phát hành bản Tiếng Việt vào tháng 9 năm 2019, chịu trách nhiệm bởi Nhà xuất bản Thế Giới.
            Trong cuốn sách, tác giả Cảnh Thiên thẳng thắn chia sẻ những quan niệm, trải nghiệm mà bản thân có. Với văn phong nhẹ nhàng, tinh tế mà sâu sắc; với những câu chuyện bổ ích, chân thật và có tầm ảnh hưởng tích cực đến người đọc chắc hẳn bạn sẽ thấy đâu đó trong cuốn sách này đang tiềm ẩn một điều gì đó về bạn.',
            'publish_date' => '2019-09-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h40.jpg',
            'category_id' => 4,
            'author_id' => 21,
        ]);
        Book::create([
            'name' => 'Sức mạnh tình bạn',
            'description' => 'Thử thách khó khăn và quan trọng nhất của con người chính là sự tương tác trong mối quan hệ giữa người với người, mang tính xã hội hết sức phức tạp. Và khi chúng ta thất bại hay thành công trong một mối quan hệ nào đó cũng là lúc ta học được nhiều điều nhất, cũng như rút ra được những kinh nghiệm quý báu cho những mối quan hệ về sau.<br/>
            Trong “tổ chức xã hội” ấy, có thể nói tình bạn chính là nhân tố trung tâm, ảnh hưởng vô cùng sâu rộng đến tất cả các mối quan hệ khác như bạn bè, vợ chồng, con cái, đồng nghiệp... Nếu biết cư xử khéo léo trong tình bạn thì chúng ta cũng sẽ biết cách thu hút người khác, xây dựng nhóm làm việc hiệu quả, nuôi dạy con cái, điều hòa quan hệ gia đình và gắn bó với ',
            'publish_date' => null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h41.jpg',
            'category_id' => 4,
            'author_id' => 22,
        ]);
        Book::create([
            'name' => 'Sống hết minh cho ngày hôm nay',
            'description' => 'Sống Hết Mình Cho Ngày Hôm Nay - Cuốn sách lập kỷ lục với 30 vạn bản được bán ra trong vòng 1 năm. Sống Hết Mình Cho Ngày Hôm Nay sẽ giúp bạn tìm thấy chính mình giữa bộn bề của thế giới này, để từ đó biết sống hết mình cho hôm nay, thôi chấp niệm về quá khứ và lo lắng vô ích cho những điều chưa xảy ra ở tương lai. Với những giá trị giản dị mà sâu sắc, cuốn sách dễ dàng đi vào lòng bạn đọc và để lại nhiều dấu ấn tích cực.',
            'publish_date' =>null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h42.jpg',
            'category_id' => 4,
            'author_id' => 23,
        ]);

        Book::create([
            'name' => 'Hãy sống một cuộc đời như bạn muốn',
            'description' => 'Hãy sống cuộc đời như bạn muốn, cuốn sách kỹ năng của tác giả Pam Grout sẽ hướng dẫn bạn cách thay đổi thái độ, nắm bắt ý tưởng, và phát triển năng lực tiềm ẩn của bản thân để đạt đến tiềm năng thành công. Bằng cách nghĩ lớn, mơ lớn và đặt ra các câu hỏi lớn, mỗi người chúng ta chắc chắn sẽ tạo sự khác biệt trong cuộc sống của bản thân và những người xung quanh.<br/>
            Chúng ta luôn luôn đặt ra cho bản thân câu hỏi rằng, làm thế nào để sống một cuộc sống như chúng ta mơ ước? Mà quên mất một thực tế rằng dù đau đáu về một cuộc sống như thế nhưng chúng ta vẫn đang quẩn quanh với những lịch trình hàng ngày, những việc làm nhàm chán đến mức gần như làm tê liệt ý chí vùng vẫy thoát ra khỏi nó. Chúng ta muốn sống khác nhưng vẫn dành quá nhiều thời gian xem tivi mỗi ngày, sa đà vào những bữa tiệc vui chơi quên ngày tháng, vẫn chấp nhận gắn bó với công việc mà mình không yêu thích, v.v… Vâng, để có một cuộc sống như mơ ước, việc bạn chỉ khao khát, thèm muốn và làm một vài hành động đơn lẻ thôi không đủ, bởi để sống khác cần đến sự tổng hòa của rất nhiều yếu tố.',
            'publish_date' =>'2014-06-20',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h43.jpg',
            'category_id' => 4,
            'author_id' => 24,
        ]);
        Book::create([
            'name' => 'Bài học cuộc sống',
            'description' => 'Neil Armstrong mơ được đặt chân lên mặt trăng. Thomas Edison mơ tạo ra một nguồn sáng hoạt động đơn giản và ít tốn kém. Anh em nhà Wright mơ được cưỡi cỗ máy biết bay thần kỳ. Bill Gates mơ đến một ngày bàn làm việc nào cũng có một chiếc máy vi tính. Ước mơ to lớn của bạn là gì? Và bạn sẽ làm gì ngay từ hôm nay để biến ước mơ đó thành hiện thực?<br/>

            Chuyện gì sẽ xảy ra nếu bạn gom góp tất cả các bài học quan trọng nhất về cuộc đời này mà bạn muốn con, cháu mình sẽ được học? Sẽ ra sao nếu bạn áp dụng những quy tắc thành công này vào cuộc sống?<br/>

            Trong Bài Học Cuộc Sống, tác giả của nhiều cuốn sách best seller Brian Bartes chia sẻ những bài học quan trọng nhất về cuộc sống mà ông muốn chính bốn đứa con của mình học được. Dù bạn đang tìm kiếm chìa khóa thành công cho chính mình, hay một món quà cho người khác, thì cuốn sách chính là cuốn cẩm nang tuyệt vời để gây dựng một cuộc sống tươi đẹp.
            ',
            'publish_date' =>null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h44.jpg',
            'category_id' => 1,
            'author_id' =>25,
        ]);
        Book::create([
            'name' => 'Thức Tỉnh Mục Đích Sống',
            'description' => 'Mục đích chính của “Thức tỉnh mục đích sống”  không phải là để cung cấp thêm thông tin hay những niềm tin mù quáng cho trí năng của bạn, hay cố thuyết phục bạn về một điều gì, mà nó mang đến cho bạn một sự chuyển hóa trong nhận thức, tức là thức tỉnh bạn ra khỏi những dòng suy nghĩ miên man ở trong đầu. Nếu được như vậy thì bạn sẽ không chỉ thấy cuốn sách là “thú vị”. Vì thú vị có nghĩa là bạn còn đứng ở bên ngoài, tìm vui với những ý nghĩ, và khái niệm ở trong đầu bạn để tư duy rằng mình đồng ý hay không nên đồng ý với cuốn sách. Vì “Thức tỉnh mục đích sống”  được viết cho bạn, do đó cuốn sách hoặc rất vô nghĩa đối với bạn, hoặc nó làm cho nhận thức của bạn có sự thay đổi lớn. Tuy nhiên cuốn sách này chỉ có thểthức tỉnh những người đã sẵn sàng để tỉnh thức. Mà không phải ai cũng sẵn sàng để tỉnh thức. Nếu trong lúc này bạn chưa rõ tỉnh thức có nghĩa là gì, thì bạn cũng không cần bận tâm nhiều về nghĩa của từ ấy, hãy cứ tiếp tục đọc và khi nào trong bạn có sự tỉnh thức, thì bạn sẽ hiểu “tỉnh thức” có nghĩa là gì. Quá trình tỉnh thức một khi đã bắt đầu ở trong bạn rồi thì không thể đảo ngược lại; và để cho quá trình này được bắt đầu, bạn chỉ cần trải qua trạng thái tỉnh thức - dù chỉ trong một thoáng chốc. Đối với một số người thì một thoáng chốc của trạng thái tỉnh thức đó sẽ xảy đến khi họ đọc cuốn sách này.',
            'publish_date' =>null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h45.jpg',
            'category_id' => 1,
            'author_id' =>26,
        ]);
        Book::create([
            'name' => 'Nếu chỉ còn một ngày để sống',
            'description' => '“Nếu chỉ còn một ngày để sống” (tựa gốc “Everything, Everything”) của tác giả Nicola Yoon là tiểu thuyết bán chạy số 1 trong 9 tháng liền, theo New York Times. Tác phẩm cũng đã được chuyển thể thành phim điện ảnh ra mắt tháng 5-2017.<br/>
            Tại Việt Nam, sách được NXB Văn học phối hợp với Minbooks phát hành tháng 7-2017.<br/>
            Madeline mắc hội chứng thiếu hụt miễn dịch tổ hợp trầm trọng (SCID), còn gọi “Hội chứng em bé bong bóng”. Căn bệnh khiến cô dị ứng với cả thế giới, bất cứ thứ gì cũng có thể gây bệnh. Madeline buộc phải sống trong một môi trường vô trùng, hoàn toàn cách ly, được chăm sóc tận tình bởi một cô y tá chuyên nghiệp và người mẹ là bác sĩ.',
            'publish_date' =>'2017-07-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h46.jpg',
            'category_id' => 4,
            'author_id' => 27,
        ]);
        Book::create([
            'name' => 'Giới Hạn Của Bạn Chỉ Là Xuất Phát Điểm Của Tôi',
            'description' => 'Giới Hạn Của Bạn Chỉ Là Xuất Phát Điểm Của Tôi<br/>
            Giới hạn là gì?<br/>
            Giới hạn liệu có phải ranh giới an toàn của mỗi người?<br/>
            Có lẽ không, giới hạn là để phá bỏ<br/>
            Bởi giới hạn của bạn chỉ là xuất phát điểm của người khác.<br/>
            Tôi tin rằng bạn có những ước mơ rất tuyệt vời, tôi cũng tin rằng bạn có thể thực hiện được nó. Nhưng ước mơ mà không hành động thì mãi mãi chỉ nằm trong mộng tưởng, hành trình dài mà không đi thì mãi mãi vẫn chẳng thể chạm đích. Giới hạn đặt ra để bứt phá, chứ không phải điểm tận cùng. Tôi hy vọng mỗi sáng đánh thức bạn dậy không phải là tiếng chuông đồng hồ mà là khát vọng lớn lao trong trái tim bạn.',
            'publish_date' =>'2018-07-07',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h47.jpg',
            'category_id' => 4,
            'author_id' => 28,
        ]);
        Book::create([
            'name' => 'BẠN CHỈ CẦN SỐNG TỐT, TRỜI XANH TỰ AN BÀI',
            'description' => 'Chẳng phải có ai đó đã từng nói rằng: Trên đời này, ta thường quên mất việc của bản thân, thích xen vào việc của người khác và lo lắng chuyện của ông trời. Vậy thì muốn vui vẻ, chỉ cần để tâm đến việc của mình, đừng xen vào việc của người khác và hãy để trời xanh tự an bài.<br/>

            Làm người, nên hiểu mệnh, đừng xem mệnh. Mệnh ở đây chính là những điều ta đã gieo trong quá khứ, việc đang làm trong hiện tại và tất cả sẽ ảnh hưởng đến tương lai. Hiểu mình là ai, đang đứng ở vị trí nào, cần sống và cư xử ra sao để trước hết thấy bản thân tự tại, trung dung. Thế giới của người khác, vận của trời, nếu không bước vào được thì đừng cố chen vào, làm khó người khó mình. Hà tất phải như vậy?',
            'publish_date' =>null,
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h48.jpg',
            'category_id' => 4,
            'author_id' => 29,
        ]);
        Book::create([
            'name' => 'Điều Ý Nghĩa Nhất Trong Từng Khoảnh Khắc Cuộc Đời',
            'description' => 'The One Thing - Điều Ý Nghĩa Nhất Trong Từng Khoảnh Khắc Cuộc Đời (Tái Bản 2018)<br/>
            Bạn muốn ít sự sao nhãng. Bạn muốn ít sự lựa chọn. Hàng ngày, bạn phải trả lời cả đống email, tin nhắn qua điện thoại, tin nhắn trên internet khiến bạn sao nhãng và ức chế tâm lý nặng nề. Bạn luôn phải đáp ứng cùng lúc ít nhất hai vai trò. Khi đi làm, bạn phải là một nhân viên tốt, hoàn thành xuất sắc công việc, đồng thời khi tan sở về nhà, bạn phải trở thành người chồng/vợ, người cha/mẹ, người con tốt, hoàn thành nghĩa vụ với gia đình mình. Cái giá bạn phải trả là gì? Chất lượng công việc đi xuống, trễ deadline, lương thấp, không thăng tiến và ức chế nặng.',
            'publish_date' =>'2018-05-22',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h49.jpg',
            'category_id' => 4,
            'author_id' => 30,
        ]);
        Book::create([
            'name' => 'Sống chậm mà chất',
            'description' => 'Tận hưởng cuộc sống qua từng khoảnh khắc.<br/>
            Cuốn sách này sẽ không đưa đến cho bạn những khái niệm mới. Nó viết về những khái niệm đã trở nên quen thuộc trong suốt thời gian qua tại Việt Nam: sống chậm, sống tối giản, chánh niệm… Nó sẽ là góc nhìn và sự tổng hợp đến từ tác giả Brooke McAlary – người xếp hạng 1 trên bảng iTune Health Postcast của Apple năm 2016 với Postcast The Slow Home được hơn 1 triệu lượt tải về trên khắp thế giới.',
            'publish_date' =>'2020-01-01',
            'price' => 30000,
            'quality' => 86,
            'image'=>'/asset/img/h50.jpg',
            'category_id' => 4,
            'author_id' => 31,
        ]);





    }
}
