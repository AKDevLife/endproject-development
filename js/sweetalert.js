const send = document.getElementById('send');

        send.addEventListener('click',sendborrow);
        function sendborrow(){
            swal({
            title: "ยืนยันการส่งคำขอยืม?",
            text: "ตรวจสอบอุปกรณ์และจำนวนอุปกรณ์ให้ถูกต้อง!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("เรียบร้อย! ส่งคำขอยืมสำเร็จ!", {
                icon: "success",
                });
            }
            });
        }