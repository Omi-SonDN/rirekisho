/* Javascript tutorial */

/**
 * Step 1: Variable
 * Biến
 */

//Khai báo biến
var a = 10;
var b = "Hello World";

//Nối chuỗi
var c = a+b; // 10Hello World;

//Phép cộng
var d = a+9; // 19
//Biểu thức tính toán chỉ thực hiện với các kiểu số, không phải chuỗi

/**
 * Phạm vi biến (IMPORTANT)
 *
 * Các biến đều có phạm vi của nó và được xác định trong một khối lệnh { vầ }
 */

var a = 10; //có tác dụng trên toàn bộ khối lệnh ngoài (trực thuộc file hiện tại)
function b(c,d){ //Tham số c,d cũng chỉ có tác dụng trong hàm mà thôi
	var e = 11; //Biến chỉ có tác dụng trong hàm b; ra ngoài biến e sẽ ko được hiểu như ở trong hàm hiện tại
}
console.log(c); //undifided

/**
 * Hàm (Phương thức function )
 */

//Không có giá trị trả về
function f(){ console.log(g); } //hiển thị biến g ra màn hình console;
//Có giá trị trả về
function h(){ return i; } 		//trả về giá trị của biến i
//một kiểu khai báo hàm kiểu khác
var j = function(){...}			//Là một kiểu khai báo function dạng closure; tương đương function j(){...}


/**
 * Events Sự kiện
 * Các sự kiện xảy ra trong HTML khi người dùng tương tác với các phần tử của HTML
 * Các sự kiện hay dùng:
 * 		+ focus : Tiêng anh là tập trung, có nghĩa là đối tượng đá đang được chọn
 * 		+ focusin : Tương tự focus nhưng được bắt khi chọn tới phần tử đó
 * 		+ focusout: Tương tự focusin nhưng ngược lại ( rời khỏi nó )
 * 		+ click: Sự kiện được kích hoạt khi click chuột vào đối tượng
 * 		+ change: Sự kiện được bắt khi có thay đổi
 * 		+ mouseover : sự kiện con chuột nằm trong vùng của phần tử (tương tự như hover)
 * 		+ mouseout  : sự kiện khi con chuột rời khỏi vùng của phần từ
 * 		+ keypress  : sự kiện khi gõ phím
 * 		+ keyup		: khi bấm phím nhưng chỉ kích hoạt khi nhắc tay ra khỏi phím
 * 		+ keydown   : được kích hoạt khi nhấm phím xuống
 * 		+ submit		: sự kiện được kích hoạt khi form được gửi đi (submit)
 */

/**
 * Triệu tập đối được (chọn đói tượng áp dụng javascript)
 * có một số kiểu gọi đối tượng
 * ID: getElementById('id cua doi tuong');
 * class: getElementsByClass('class cua doi tuong') //sẽ trả về một mảng các đối tượng được tìm thấy
 * Name: getElementsByName('name cua doi tuong') //sẽ trả về một mảng các đối tượng được tìm thấy
 */

/**
 * Kiểu dữ liệu JSON
 * Đây là kiểu dữ liệu phổ biến, hỗ trợ được rất nhiều để chuyển đối các đối tượng sang dạng chuỗi
 * JSON sử dụng dấu { và } để đánh dấu bắt đầu và kết thúc một đối tượng
 * JSON sử dụng dáu [ và ] để đánh dấu bắt đầu và kết thúc của mảng
 * Lưu ý: trong mảng của JSON ko có key, chỉ có index
 * JSON sử dụng dấu , để báo hiệu hết dòng lệnh
 * JSON sử dụng dấu : để ngăn cách giữa thuộc tính và giá trị của thuộc tính
 * Dưới đây là giới thiếu về JSON cơ bản
 */
var app = {
	attribute:null,
	attribute1:10,
	attribute2:'string',
	function_name:function(){}
}

/**
 * Thư viện jQuery
 */

/**
 * Khởi đầu với jQuery thì ta sẽ đi qua 1 lượt nhỏ
 * jQuery hay $ là 2 biến cục bộ;
 * Nhưng có thể $ và jQuery xung đột với nhau, những lúc như vậy có 2 cách
 * Cách 1: sử dụng jQuery thay vì $ như trước
 * Cách 2: dùng cách viết như sau để gán lại $ là jQuery;
 * 			(function($){...})(jQuery);
 */

/**
 * Selector
 *
 * Đây là 1 thành phần quan trọng để phân biệt được tối tượng muốn áp dụng
 * Các selector được sử dụng như trong css: http://www.w3schools.com/cssref/css_selectors.asp
 * Để kiểm tra đối tượng được chọn có tồn tại hay ko! Ta sử dụng biến length;
 * $('#id_of_element').length; nếu trả về lớn hơn 0 là đã tìm ra đối tượng, còn lại thì trả về 0
 */

