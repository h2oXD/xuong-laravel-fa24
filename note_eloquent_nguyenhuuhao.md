## 1. Eloquent ORM là gì trong Laravel?
```sh
Eloquent ORM là hệ thống Object Relational Mapping (ORM) được tích hợp sẵn trong Laravel, cho phép lập trình viên thao tác với cơ sở dữ liệu bằng cách sử dụng các model dưới dạng đối tượng PHP. Thay vì viết truy vấn SQL thủ công, Eloquent giúp chúng ta tương tác với dữ liệu qua các phương thức hướng đối tượng, giúp code trở nên trực quan và dễ bảo trì hơn.

Eloquent sử dụng mô hình Active Record, nghĩa là mỗi instance của model đại diện cho một bản ghi trong cơ sở dữ liệu, và có thể trực tiếp thực hiện các thao tác như thêm, sửa, xóa và truy vấn.
```
## 2. Laravel Eloquent có các quy ước mặc định nào khi ánh xạ giữa tên model và bảng trong cơ sở dữ liệu? + 3. Làm thế nào để thay đổi tên bảng (table) và khóa chính (primary key) mặc định trong Eloquent?
 
```sh
1. Eloquent tự động giả định rằng tên bảng số ít tương ứng với tên model số nhiều
- Tên class model mặc định luôn là số ít ứng với tên bảng là dạng số nhiều.
Ví dụ:  Model User sẽ tương ứng với bảng users
        Model Post sẽ tương ứng với bảng posts.
- Tên bảng phải viết dưới dạng snake_case
- Tên bảng luôn luôn là số nhiều (ngoại trừ các bảng quan hệ)
(Nếu tên bảng không theo quy ước thì phải khai báo trong model biến protected $table)


2. Khóa chính (primary key): Eloquent mặc định sử dụng cột id làm khóa chính của bảng.
(Nếu là 1 tên khác thì phải khai báo trong model biến protected $primaryKey)


3. Timestamps: Eloquent tự động quản lý hai cột created_at và updated_at để lưu thời gian khi một bản ghi được tạo và cập nhật. 
(Tính năng này có thể được tắt nếu không cần thiết bằng cách khai báo trong model biến public $timestamp = false)
```

## 4. CRUD với Eloquent ORM như nào?
### I . READ
**1. Lấy tất cả các bản ghi**
```sh
$users = User::all();
```
**2. Lấy một bản ghi đầu tiên**
```sh
$users = User::first();
```
**3. Lấy bản ghi theo ID**
```sh
Ví dụ lấy bản ghi có id là 1

$users = User::find(1);

$users = User::where('id',1);
```
**4. Lấy nhiều bản ghi với điều kiện**
```sh
Ví dụ lấy ra tất cả các bản ghi có id > 100

$users = User::where('id','>',100)->get();
```
**5. Lấy 1 bản ghi với điều kiện**
```sh
Ví dụ

$users = User::where('email','hao@gmail.com')->first();
```

### II . CREATE 
#### (Lưu ý: Phải khai báo các cột dữ liệu muốn tương tác vào $fillable trong model)
**6.1 Thêm mới bản ghi ( Cách 1 - Sử dụng Insert)**
```sh
$data = [
        'name'  => 'HuuHao',
        'email' => 'hao@gmail.com'
];
$users = User::insert($data);
```
**6.2 Thêm mới bản ghi ( Cách 2 - Sử dụng Create)**
```sh
$data = [
        'name'  => 'HuuHao123',
        'email' => 'hao123@gmail.com'
];
$users = User::create($data);
```
### III . UPDATE 
#### (Lưu ý: Phải khai báo các cột dữ liệu muốn tương tác vào $fillable trong model)
**7 Cập nhật bản ghi**
```sh
(Nhớ có where không là cập nhật cả table)
$data = [
        'name'  => 'HuuHao123',
        'email' => 'hao123@gmail.com'
];
$users = User::where('id',1)->update($data);
```
### IV . DELETE
```sh
$users = User::find(1)->delete();

$users = User::where('id',1)->delete();

More: Có 1 kiểu delete nữa là Soft Delete
```