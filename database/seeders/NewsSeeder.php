<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['หลุดสเปค Xiaomi 16 จอแบนขอบบางเฉียบ, กล้อง 50MP สามตัว และแบตเตอรี่สุดอึด 6,500mAh!', 'Mobile', 'หลุดสเปค Xiaomi 16 จอแบนขอบบางเฉียบ, กล้อง 50MP สามตัว และแบตเตอรี่สุดอึด 6,500mAh!', "สนามรบสมาร์ทโฟนเรือธงช่วงปลายปีเริ่มร้อนระอุขึ้นอีกครั้ง เมื่อแหล่งข่าวหลุดชื่อดังอย่าง Digital Chat Station ได้เปิดเผยข้อมูลชุดสำคัญของ Xiaomi 16 ...\nจอแบนขอบบางเฉียบ ดีไซน์พรีเมียม\nข้อมูลระบุว่า Xiaomi 16 จะมาพร้อมหน้าจอ OLED แบบแบนเรียบสนิทขนาด 6.3 นิ้ว ...", 'http://siamphone.com/contents/news-54794.html', 'https://cdn-news.siamphone.com/upload/news/nw54794/000-Xiaomi-16.png'],
            ['การหลุดแรกเผยว่า AMD Radeon RX 9060 XT อาจแรงถึงระดับ NVIDIA GeForce RTX 4070', 'GPU', 'การหลุดแรกเผยว่า AMD Radeon RX 9060 XT อาจแรงถึงระดับ NVIDIA GeForce RTX 4070', "ตอนนี้ตลาด GPU กำลังแข่งขันสูง ... คาดว่าราคาจะอยู่ราว 400-500 ดอลลาร์ ซึ่งอาจทำให้การ์ดจอรุ่นนี้คุ้มค่าสำหรับผู้ใช้มากขึ้น", 'https://www.overclockzone.com/view-11694', 'https://www.overclockzone.com/_admin/covercontent/11694-1740985334.jpg'],
            ['AMD เปิดตัวเครื่องเล่นเกมราคาประหยัดอย่างเงียบๆ — AM4 ยังคงได้รับความนิยมอย่างต่อเนื่องด้วย Ryzen 5 5500X3D แต่มีจำหน่ายจำนวนจำกัด', 'CPU', 'AMD เปิดตัวเครื่องเล่นเกมราคาประหยัดอย่างเงียบๆ — AM4 ยังคงได้รับความนิยมอย่างต่อเนื่องด้วย Ryzen 5 5500X3D...', 'ซ็อกเก็ต AM4 กำลังใกล้ 10 ปี AMD เปิดตัว Ryzen 5 5500X3D อย่างเป็นทางการ ...', 'https://www.tomshardware.com/pc-components/cpus/amd-quietly-launches-a-budget-gaming-beast-ryzen-5-5500x3d-arrives-for-the-latin-american-market', 'https://cdn.mos.cms.futurecdn.net/YJ6u4JCsvN5kK4uwiiTQ7B-650-80.jpg.webp'],
            ['Microsoft ถอด Windows 11 24H2 ออกจาก Preview Channel บัคเยอะเกินต้าน', 'OS', 'Microsoft ถอด Windows 11 24H2 ออกจาก Preview Channel บัคเยอะเกินต้าน', 'Microsoft ยุติการปล่อย 24H2 ชั่วคราวหลังมีรายงานปัญหาแอปค้าง ประสิทธิภาพตก VPN ใช้ไม่ได้ เป็นต้น', 'https://www.overclockzone.com/_admin/covercontent/9751-1718178012.jpg', 'https://www.overclockzone.com/_admin/covercontent/9751-1718178012.jpg'],
            ['AMD เปิดตัวการ์ดจอ Radeon RX 7400 อย่างเป็นทางการ พร้อมหน่วยประมวลผล 28 คอร์ แรม GDDR6 8 GB และกินไฟ TBP 55W', 'GPU', 'AMD Radeon RX 7400 เปิดตัวอย่างเป็นทางการ', 'RDNA 3, 1792 shaders, GDDR6 8GB 10.8Gbps, TBP 55W เหมาะกับ OEM และเดสก์ท็อประดับเริ่มต้น', 'https://www.vmodtech.com/th/news/amd-radeon-rx-7400', 'https://www.vmodtech.com/main/wp-content/uploads/2025/08/10/amd-radeon-rx-7400/amd-radeon-rx-7400.jpg'],
            ['ROG THOR 1600W Titanium III', 'HARDWARE', 'GaN MOSFET + GPU-First + จอ OLED แม่เหล็ก', 'PSU ประสิทธิภาพสูง รองรับ ATX 3.1 วัสดุพรีเมียม รับประกัน 10 ปี', 'https://rog.asus.com/power-supply-units/rog-thor/rog-thor-1600t3-gaming/', 'https://dlcdnwebimgs.asus.com/gain/7A66D029-CC16-40F7-9913-D263965D77FA/w717/h525/fwebp'],
            ['NVIDIA เปิดตัว GeForce RTX 5050 – สเปก เทคโนโลยี และราคา', 'GPU', 'การ์ดจอเริ่มต้น $249 สถาปัตยกรรม Blackwell', '2560 CUDA cores, 8GB GDDR6 รองรับ DLSS 4 และ Ray Tracing รุ่นล่าสุด', 'https://www.nvidia.com/th-th/geforce/graphics-cards/50-series/rtx-5050/', 'https://www.nvidia.com/content/nvidiaGDC/th/th_TH/geforce/graphics-cards/50-series/rtx-5050/_jcr_content/root/responsivegrid/nv_container_copy_231026058/nv_container/nv_image.coreimg.100.630.jpeg/1750247728543/geforce-rtx-50-series-architecture-ari.jpeg'],
            ['ไอเดียบรรเจิด! คนไทยหัวกะทิสร้างเคสคอมพ์โฉมใหม่ ดีไซน์ ค้อนธอร์', 'HARDWARE', 'คนไทยเจ๋ง! ออกแบบเคส “ค้อนธอร์”', 'คว้ารางวัล Thermaltake CaseMOD Invitational Season 1', 'https://www.thairath.co.th/news/tech/504675', 'https://static.thairath.co.th/media/HCtHFA7ele6Q2dULVTHrwt2j9h1VNgIryqbZ1kPtiEqcC8sPuhiITjimmDPbCzqKdq.webp'],
            ['นัก MOD คนไทยสร้างเคสคอมพิวเตอร์ POINT BLANK BARRETT RADEON RX480 BY Suchao', 'HARDWERE', 'เคสทรง Barrett M82A1 ใช้งานได้จริง', 'CPU AMD A10-7800 + RX 480 8GB น้ำคูลลิ่ง custom ปุ่ม “ทริกเกอร์” เปิดเครื่อง', 'https://www.extremeit.com/mod-point-blank-barrett-radeon-rx480-suchao-amd-pb/', 'https://www.extremeit.com/wp-content/uploads/2016/09/14305220_1261907593843087_6838200237261855326_o-696x464.jpg'],
            ['Logitech เปิดตัว G915 X Series — คีย์บอร์ดเกมมิ่งบางเฉียบ พร้อมนวัตกรรมเต็มเปี่ยม', 'GPU', 'โปรไฟล์ต่ำ 23 มม. สวิตช์ Galvanic ใหม่', 'keycaps PBT double-shot โครงอลูมิเนียมหนาขึ้น เปิดตัวในงาน Logi PLAY 2024', 'https://news.logitech.com/press-releases/news-details/2024/Logitech-G-Introduces-the-G915-X-Series---The-Most-Advanced-Low-Profile-Gaming-Keyboard-Ever-Built/default.aspx', 'https://imagenes.elpais.com/resizer/v2/4FOAA5CHA5FEDMBZQRLVG7MNGE.jpg?width=1200'],
        ];

        foreach ($data as $a) {
            News::create([
                'title' => $a[0],
                'category'=> $a[1],
                'subtitle'=> $a[2],
                'body' => $a[3],
                'link' => $a[4],
                'image' => $a[5],
                'published_at' => now(),
            ]);
        }
    }
}