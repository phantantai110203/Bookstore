<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Kỹ năng sống',
            'description'=>'"Kỹ năng sống" trong sách thường tập trung vào việc cung cấp kiến thức, hướng dẫn và phương pháp để phát triển và cải thiện các kỹ năng và khả năng cần thiết để sống và thành công trong cuộc sống hàng ngày.',
        ]);
        Category::create([
            'name' => 'Truyện Tranh',
            'description'=>'Thể loại truyện tranh là các danh mục phân loại dựa trên các yếu tố nội dung, tình tiết và tông màu chung trong truyện tranh bao gồm thể loại: Hành động (Action), Phiêu lưu (Adventure), Hài hước (Comedy), Tình yêu (Romance)...',
        ]);
        Category::create([
            'name' => 'Sách Giáo Khoa',
            'description'=>'SGK là loại sách cung cấp kiến thức, được biên soạn với mục đích dạy và học tại trường học[1][2]. Thuật ngữ sách giáo khoa còn có nghĩa mở rộng là một loại sách chuẩn cho một ngành học. Sách giáo khoa được phân loại dựa theo đối tượng sử dụng hoặc chủ đề của sách. Việc xuất bản sách giáo khoa thường dành cho các nhà xuất bản chuyên ngành.',
        ]);
        Category::create([
            'name' => 'Tiểu thuyết',
            'description'=>'Tiểu thuyết là một thể loại văn học dài, tập trung vào việc xây dựng câu chuyện và phát triển nhân vật. Đây là một hình thức tường thuật tường minh, cho phép tác giả khám phá và khắc họa sâu hơn về tâm lý, ý nghĩa và sự phát triển của các nhân vật và sự kiện trong câu chuyện.',
        ]);

    }
}
