<script type="text/javascript">
    $(document).ready(function() {
		$(".upload-button").on('click', function() {
			$(".file-upload").click();
		});
		var readURL = function(input) {
			//Kiểm tra xem có phải là file không và lấy file đầu tiên
			if (input.files && input.files[0]) {
				//Khởi tạo đối tượng để đọc nguồn dữ liệu file
				var reader = new FileReader();
				//Sự kiện onload
				reader.onload = function (e) {
					//Trả về Url
					$('.profile-pic').attr('src', e.target.result);
				}
				//Đọc tệp tin người dùng vừa đọc
				reader.readAsDataURL(input.files[0]);
			}
		}
		//Hiển thị url vửa trả về
		$(".file-upload").on('change', function(){
			readURL(this);
		});
	});
</script>
<script type="text/javascript">
    const realFileBtn = document.getElementById("real-file");
	const customBtn = document.getElementById("custom-button");
	const customTxt = document.getElementById("custom-text");

	customBtn.addEventListener("click", function() {
		realFileBtn.click();
	});

	realFileBtn.addEventListener("change", function() {
		if (realFileBtn.value) {
			customTxt.innerHTML = realFileBtn.value.match(
				/[\/\\]([\w\d\s\.\-\(\)]+)$/
				)[1];
		} else {
			customTxt.innerHTML = "No file chosen, yet.";
		}
	});

</script>
<script type="text/javascript">
    $(function(){
		$('.delete_part').click(function(){
			var id = $(this).data('id');
			var url ="{{url('departments/delete')}}/"+id;
			Swal.fire({
				title: "{{__('messages.common.confirm')}}",
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url:url,
						type:'GET',
						data:{"id":id},
						success:function(data)
						{
							if(data.success)
							{
								Swal.fire({
									type: 'success',
									title:"Thông báo",
									text:"Xóa thành công",
									button:"Done",
								});
                                setTimeout(() => {
                                    window.location.reload();
                                }, 800)
							}
							else
							{
								Swal.fire({
									type: 'error',
									title:"Thông báo",
									text:"Tài khoản này không thể xóa",
									button:"Done",
								});
							}
						},
						error:function()
						{
							Swal.fire({
								type: 'error',
								title:"Thông báo",
								text:"Xóa thất bại",
								button:"Done",
							})
						},
					});
				}
			})
		});
	});
</script>
<script type="text/javascript">
    $(function(){
		$('.delete_employ').click(function(){
			var id = $(this).data('id');
			var url ="{{url('employees/delete')}}/"+id;
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url:url,
						type:'GET',
						data:{"id":id},
						success:function(data)
						{
							if(data.success)
							{
								Swal.fire({
									type: 'success',
									title:"Thông báo",
									text:"Xóa thành công",
									button:"Done",
								});
                                setTimeout(() => {
                                    window.location.reload();
                                }, 800)
							}
							else
							{
								Swal.fire({
									type: 'error',
									title:"Thông báo",
									text:"Tài khoản này không thể xóa",
									button:"Done",
								});
							}
						},
						error:function()
						{
							Swal.fire({
								type: 'error',
								title:"Thông báo",
								text:"Xóa thất bại",
								button:"Done",
							})
						},
					});
				}
			})
		});
	});
</script>
<script type="text/javascript">
    $(function(){
		$('.delete_users').click(function(){
			var id = $(this).data('id');
			var url ="{{url('users/delete')}}/"+id;
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						url:url,
						type:'GET',
						data:{"id":id},
						success:function(data)
						{
							if(data.success)
							{
								Swal.fire({
									type: 'success',
									title:"Thông báo",
									text:"Xóa thành công",
									button:"Done",
								});
                                setTimeout(() => {
                                    window.location.reload();
                                }, 800)
							}
							else
							{
								Swal.fire({
									type: 'error',
									title:"Thông báo",
									text:"Tài khoản này không thể xóa",
									button:"Done",
								});
							}
						},
						error:function()
						{
							Swal.fire({
								type: 'error',
								title:"Thông báo",
								text:"Xóa thất bại",
								button:"Done",
							})
						},
					});
				}
			})
		});
	});
</script>
<script>
    $(function(){
		//Thêm mới
		$('.modal-salary').click(function(){
			$('#exampleModal').modal('show');
			var id = $(this).data('id');
			$('#employ_id').val(id);
		});
		$('#save-salary').on('click',function(e){
			e.preventDefault();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			var employ_id   = $('#employ_id').val();
			var numberofday = $('#numberofday').val();
			var numberofot  = $('#numberofot').val();
			var lateday     = $('#lateday').val();
			var salary      = $('#salary').val();
			var allowance   = $('#allowance').val();
			$.ajax({
				url:"{{route('salary.store')}}",
				type:"POST",
				data:{
					'employ_id':employ_id,
					'numberofday':numberofday,
					'numberofot':numberofot,
					'lateday':lateday,
					'salary':salary,
					'allowance':allowance,
				},
				dataType:"JSON",
				success:function(data)
				{
					console.log(data);

					$.each(data.errors,function(key, value){
						$('#message-salary').removeClass('hidden');
						$('#message-salary').text('Message ! '+value);
					});

					if(data.success)
					{
						Swal.fire({
							type: 'success',
							title: 'Thông báo !',
							text: 'Thêm mới thành công...',
						});
                        setTimeout(() => {
                                    window.location.reload();
                                }, 800)
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
    $('.salary-modal').click(function(){
		var id = $(this).data('id');
		var numberofday = $(this).data('numberofday');
		var numberofot = $(this).data('numberofot');
		var lateday = $(this).data('lateday');
		var salary = $(this).data('salary');
		var allowance = $(this).data('allowance');
		$('#up_numberofday').val(numberofday);
		$('#up_numberofot').val(numberofot);
		$('#up_lateday').val(lateday);
		$('#up_salary').val(salary);
		$('#up_allowance').val(allowance);
		$('#up_id').val(id);
		$('#exampleModal1').modal('show');
	});
	$('#edit-salary').on('click',function(e){
		e.preventDefault();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var id   		= $('#up_id').val();
		var numberofday = $('#up_numberofday').val();
		var numberofot  = $('#up_numberofot').val();
		var lateday     = $('#up_lateday').val();
		var salary      = $('#up_salary').val();
		var allowance   = $('#up_allowance').val();
		$.ajax({
			url:"{{url('salary')}}/"+id,
			type:"PUT",
			data:{
				'id':id,
				'numberofday':numberofday,
				'numberofot':numberofot,
				'lateday':lateday,
				'salary':salary,
				'allowance':allowance,
			},
			dataType:"JSON",
			success:function(data)
			{
				$.each(data.errors,function(key, value){
					$('#message-salary1').removeClass('hidden');
					$('#message-salary1').text('Message ! '+value);
				});

				if(data.success)
				{
					Swal.fire({
						type: 'success',
						title: 'Thông báo !',
						text: 'Cập nhật thành công...',
					});
                    setTimeout(() => {
                        window.location.reload();
                    }, 800)
				}
			}
		});
	});
</script>
