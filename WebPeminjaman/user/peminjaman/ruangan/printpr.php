<?php
    require("../barang/fpdf/fpdf.php");
    require("../../../koneksi.php");

    $pdf = new FPDF('P','mm','A4');
    $pdf->AddPage();
    
    $query = mysqli_query($conn,'SELECT pinjamruangan.id, pinjamruangan.id_ruangan, pinjamruangan.id_user, pinjamruangan.tgl_mulai, pinjamruangan.tgl_selesai, pinjamruangan.status, ruangan.nama_ruangan, ruangan.deskripsi, user.nama_lengkap from pinjamruangan inner join ruangan on ruangan.id=pinjamruangan.id_ruangan inner join user on user.id=pinjamruangan.id_user');
    $d = mysqli_fetch_array($query);
    
    //Display Company Info
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(50,10,"UNIVERSITAS PENDIDIKAN INDONESIA",0,1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,7,"Jl. Pendidikan No.15, Cibiru Wetan, Cileunyi, Kabupaten Bandung",0,1);
    $pdf->Cell(50,7,"40625",0,1);
    $pdf->Cell(50,7,"Telp: (022) 7801840",0,1);
        
    //Display Image
    $pdf->Image('logo_upi.jpg', 170, 13, 23);
        
    //Display Horizontal line
    $pdf->Line(0,48,210,48);
      
     
    //Details
    $pdf->SetY(55);
    $pdf->SetX(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(50,10,"Informasi Peminjam: ",0,1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(50,7,"Nama : ".$d["nama_lengkap"],0,1);
    $pdf->Cell(50,7,"Nim : ".$d["id_user"],0,1);
        
    //Display Invoice no
    $pdf->SetY(55);
    $pdf->SetX(-60);
    $pdf->Cell(50,7,"Invoice No : ".$d["id"]);
        
    //Display Invoice date
    $pdf->SetY(63);
    $pdf->SetX(-60);
    $pdf->Cell(50,7,"Invoice Date : ".$d["tgl_mulai"]);
        
    //Display Table headings
    $pdf->SetY(95);
    $pdf->SetX(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,9,"NAMA RUANGAN",1,0);
    $pdf->Cell(60,9,"DESKRIPSI",1,0,"C");
    //$pdf->Cell(30,9,"QTY",1,0,"C");
    $pdf->Cell(60,9,"TGL SELESAI",1,1,"C");
    $pdf->SetFont('Arial','',12);
        
        
    $pdf->Cell(60,9,$d["nama_ruangan"],"LRB",0);
    $pdf->Cell(60,9,$d["deskripsi"],"RB",0,"C");
    //$pdf->Cell(30,9,$d["qty"],"RB",0,"C");
    $pdf->Cell(60,9,$d["tgl_selesai"],"RB",1,"C");
        
       
    //set footer position
    $pdf->SetY(-66);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0,10,"Admin,",0,1,"R");
    $pdf->Ln(15);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,"TTD admin",0,1,"R");
    $pdf->SetFont('Arial','',10);
        
    //Display Footer Text
    $pdf->Cell(0,10,"This is a computer generated invoice",0,1,"C");
        
    
  
    $pdf->Output('D', 'invoice.pdf');
    //$pdf->Output();
?>
