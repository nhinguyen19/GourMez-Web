<?php
    class nhanvien
    {
        private $manv;
        private $tennv;
        private $songaylam;
        private $luongtheongay;

        public function Gan($ma,$ten,$songay,$luongngay)
        {
            $this->manv = $ma;
            $this->tennv = $ten;
            $this->songaylam = $songay;
            $this->luongtheongay = $luongngay;
        }


        public function TinhLuong()
        {
            $luong = $this->luongtheongay*$this->songaylam;
            return $luong;
        }
        public function InNhanVien()
        {
            echo"Mã nhân viên: ".$this->manv;
            echo"<br>";
            echo"Tên nhân viên: ".$this->tennv;
            echo "<br>";
            echo"Số ngày làm việc: ".$this->songaylam;
            echo"<br>";
            echo"Lương ngày: ".$this->luongtheongay;
            echo"<br>";
            
        }
    }

    class nhanvienQL extends nhanvien
    {
        private $PhuCap;

        public function Gan($ma,$ten,$songay,$luongngay)
        {  
            parent::Gan($ma,$ten,$songay,$luongngay); //gọi phương thức của lớp cha
           $this->PhuCap = 2000;
        }
        public function InNhanVien()
        {
            parent::InNhanVien();
            echo"Phụ cấp: ".$this->PhuCap;
            echo"<br>";
           
        }

        public function TinhLuong()
        {
            $luong = parent::TinhLuong() + $this->PhuCap;
            return $luong;
        }
    }
?>