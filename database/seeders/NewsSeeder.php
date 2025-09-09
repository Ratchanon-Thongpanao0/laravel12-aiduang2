<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /** ดึง URL ออกจากสตริงที่อาจเป็น Markdown link [text](url) หรือเป็น url ตรง ๆ */
    private function toUrl(?string $s): ?string
    {
        if (!$s) return null;
        // ตรงรูปแบบ [text](url)
        if (preg_match('/\((https?:\/\/[^)]+)\)/i', $s, $m)) {
            return $m[1];
        }
        // ถ้าเป็น url ตรง ๆ
        if (preg_match('/^https?:\/\/\S+$/i', trim($s))) {
            return trim($s);
        }
        return null;
    }

    /** ทำ category ให้สะอาด (แก้สะกดที่พบบ่อย) */
    private function normalizeCategory(?string $c): ?string
    {
        if (!$c) return null;
        $c = trim($c);
        if (strcasecmp($c, 'HARDWERE') === 0) return 'HARDWARE';
        return $c;
    }

    public function run(): void
    {
        $rows = [
            // title, category, summary, content, source(as markdown), image(as markdown)
            ['หลุดสเปค Xiaomi 16 จอแบนขอบบางเฉียบ, กล้อง 50MP สามตัว และแบตเตอรี่สุดอึด 6,500mAh!', 'Mobile', 'หลุดสเปค Xiaomi 16 จอแบนขอบบางเฉียบ, กล้อง 50MP สามตัว และแบตเตอรี่สุดอึด 6,500mAh!', "สนามรบสมาร์ทโฟนเรือธงช่วงปลายปีเริ่มร้อนระอุขึ้นอีกครั้ง เมื่อแหล่งข่าวหลุดชื่อดังอย่าง Digital Chat Station ได้เปิดเผยข้อมูลชุดสำคัญของ Xiaomi 16 ว่าที่เรือธงรุ่นมาตรฐานตัวใหม่ ซึ่งสเปคที่เปิดเผยออกมานั้นถือว่าไม่ธรรมดา โดยเฉพาะความจุแบตเตอรี่ที่อาจสร้างมาตรฐานใหม่ให้กับวงการ
จอแบนขอบบางเฉียบ ดีไซน์พรีเมียม
ข้อมูลระบุว่า Xiaomi 16 จะมาพร้อมหน้าจอ OLED แบบแบนเรียบสนิทขนาด 6.3 นิ้ว ซึ่งเป็นดีไซน์ที่สวนกระแสรุ่น Pro ที่มีข่าวลือว่าจะใช้จอโค้ง จุดเด่นคือขอบจอที่บางเฉียบและสมมาตรเท่ากันทุกด้าน ทำให้ตัวเครื่องดูพรีเมียมและทันสมัย", '[http://siamphone.com/contents/news-54794.html](http://siamphone.com/contents/news-54794.html)', '[https://cdn-news.siamphone.com/upload/news/nw54794/000-Xiaomi-16.png](https://cdn-news.siamphone.com/upload/news/nw54794/000-Xiaomi-16.png)'],
            ['การหลุดแรกเผยว่า AMD Radeon RX 9060 XT อาจแรงถึงระดับ NVIDIA GeForce RTX 4070', 'GPU', 'การหลุดแรกเผยว่า AMD Radeon RX 9060 XT อาจแรงถึงระดับ NVIDIA GeForce RTX 4070', "ตอนนี้ตลาด GPU กำลังแข่งขันสูง ทั้ง NVIDIA และ AMD ออกการ์ดจอรุ่นใหม่เพื่อตอบโจทย์เกมเมอร์ โดย AMD เตรียมเปิดตัว RX 9060 และ RX 9060 XT ที่มี VRAM GDDR6 12 GB ส่วนรุ่น XT เพิ่มอีก 4 GB คาดว่าจะชนกับ RTX 5060/5060 Ti ของ NVIDIA ซึ่งอาจใช้ GDDR7 ขนาด 8-16 GB
ข้อมูลจาก Moores Law Is Dead เผยว่า RX 9060 XT จะมีประสิทธิภาพดีกว่า RTX 4060 Ti และใกล้เคียง RX 7700 XT โดยคาดว่าราคาจะอยู่ราว 400-500 ดอลลาร์ ซึ่งอาจทำให้การ์ดจอรุ่นนี้คุ้มค่าสำหรับผู้ใช้มากขึ้น", '[https://www.overclockzone.com/view-11694](https://www.overclockzone.com/view-11694)', '[https://www.overclockzone.com/_admin/covercontent/11694-1740985334.jpg](https://www.overclockzone.com/_admin/covercontent/11694-1740985334.jpg)'],
            ['AMD เปิดตัวเครื่องเล่นเกมราคาประหยัดอย่างเงียบๆ — AM4 ยังคงได้รับความนิยมอย่างต่อเนื่องด้วย Ryzen 5 5500X3D แต่มีจำหน่ายจำนวนจำกัด', 'CPU', 'AMD เปิดตัวเครื่องเล่นเกมราคาประหยัดอย่างเงียบๆ — AM4 ยังคงได้รับความนิยมอย่างต่อเนื่องด้วย Ryzen 5 5500X3D แต่มีจำหน่ายจำนวนจำกัด', "ซ็อกเก็ต AM4 กำลังใกล้ถึงวันเกิดครบรอบ 10 ปี และ AMD ยังคงปฏิเสธที่จะหยุดการผลิต CPU สำหรับแพลตฟอร์มระดับตำนานนี้ ผู้ผลิต CPU ได้เปิดตัว Ryzen 5 5500X3D อย่างเป็นทางการ ซึ่งเป็นซีพียู 6 คอร์ที่ใช้สถาปัตยกรรม Zen 3 ที่มุ่งเป้าไปที่ตลาดละตินอเมริกา Ryzen 5 5500X3D ถือเป็นโมเดล 3D-VCache รุ่นที่สี่ของ AMD ภายใต้กลุ่มผลิตภัณฑ์ Ryzen 5000 โดยพื้นฐานแล้วชิปนี้คือ Ryzen 5 5600X3D ที่ได้รับการปรับแต่งให้มีประสิทธิภาพมากขึ้น โดยมีสัญญาณนาฬิกาพื้นฐานที่ 3GHz และสัญญาณนาฬิกาบูสต์ที่ 4GHz แต่ยังคงใช้ Zen 3 6 คอร์เหมือนเดิม และแคช L3 ขนาด 96MB ที่น่าสนใจคือ Ryzen 5 5500X3D เป็น CPU ซีรีส์ 5500 เพียงรุ่นเดียวที่ใช้สถาปัตยกรรมแบบชิปเล็ต ชิปตัวใหม่นี้มีความจุแคช L3 เท่ากับ Ryzen 5000X3D รุ่นอื่นๆ ทั้งหมด และทำงานภายใต้ชื่อรหัส Vermeer อย่างไรก็ตาม Ryzen 5 5500 และ 5500GT ซึ่งเป็นรุ่นคู่แข่งโดยตรงนั้น ต่างก็ใช้ Zen 3 เวอร์ชันโมโนลิธิกของ AMD (ชื่อรหัสว่า Cezanne) โดยปิดการใช้งานกราฟิกแบบบูรณาการและมีแคช L3 เพียง 16MB", '[https://www.tomshardware.com/pc-components/cpus/amd-quietly-launches-a-budget-gaming-beast-ryzen-5-5500x3d-arrives-for-the-latin-american-market](https://www.tomshardware.com/pc-components/cpus/amd-quietly-launches-a-budget-gaming-beast-ryzen-5-5500x3d-arrives-for-the-latin-american-market)', '[https://cdn.mos.cms.futurecdn.net/YJ6u4JCsvN5kK4uwiiTQ7B-650-80.jpg.webp](https://cdn.mos.cms.futurecdn.net/YJ6u4JCsvN5kK4uwiiTQ7B-650-80.jpg.webp)'],
            ['Microsoft ถอด Windows 11 24H2 ออกจาก Preview Channel บัคเยอะเกินต้าน', 'OS', 'Microsoft ถอด Windows 11 24H2 ออกจาก Preview Channel บัคเยอะเกินต้าน', "Microsoft ได้มีการยุติการ Rollout Update ของ Windows 11 เวอร์ชั่น 24H2 สำหรับ Windows Insiders บน Release Preview Channel ไปแบบสดๆร้อนๆ โดยมีการประกาศให้ทราบแบบเงียบๆผ่าน Original Release Blog Post
ก่อนหน้านั้นตัว Update นี้ก็มี Preview ด้านฟีเจอร์ใหม่ๆมากมาย ไม่ว่าจะเป็น Wi-Fi 7 Support, คำสั่ง SUDO สำหรับ Windows, Rust ในตัว Windows Kernel, และการปรับตั้ง UI อื่นๆ .. แต่ตอนนี้ทาง Microsoft ก็ได้มีการเปลี่ยนแผน การเป็นการยุติการปล่อย Preview เวอร์ชั่นดังกล่าวออกมาไปเป็นที่เรียบร้อย โดยนาย Brandon LeBlanc ตำแหน่ง Senior Program Manager ของ Windows Insider Program ก็ได้ออกมาบอกเพิ่มเติมว่า \"กำลังพยายามเตรียมกลับมาปล่อยอีกครั้งเร็วๆนี้\"
แต่ถ้าเราไปมองในฝั่ง Feedback Hub ของผู้ใช้งานต่างๆก็จะเห็นว่าผู้ใช้ Insider Program ที่ได้ลองเวอร์ชั่นดังกล่าวก็มีกระแสตอบกลับในแง่ลบอยู่มากมาย ตั้งแต่เรื่องแอปค้าง, ประสิทธิภาพร่วง, VPN เชื่อมต่อไม่ได้ ฯลฯ โดยผู้ใช้บางคนถึงขั้นถล่ม Social Media ว่า \"นี่คือหายนะครั้งใหญ่ที่สุด\" ", "Microsoft ได้มีการยุติการ Rollout Update ของ Windows 11 เวอร์ชั่น 24H2 สำหรับ Windows Insiders บน Release Preview Channel ไปแบบสดๆร้อนๆ โดยมีการประกาศให้ทราบแบบเงียบๆผ่าน Original Release Blog Post
ก่อนหน้านั้นตัว Update นี้ก็มี Preview ด้านฟีเจอร์ใหม่ๆมากมาย ไม่ว่าจะเป็น Wi-Fi 7 Support, คำสั่ง SUDO สำหรับ Windows, Rust ในตัว Windows Kernel, และการปรับตั้ง UI อื่นๆ .. แต่ตอนนี้ทาง Microsoft ก็ได้มีการเปลี่ยนแผน การเป็นการยุติการปล่อย Preview เวอร์ชั่นดังกล่าวออกมาไปเป็นที่เรียบร้อย โดยนาย Brandon LeBlanc ตำแหน่ง Senior Program Manager ของ Windows Insider Program ก็ได้ออกมาบอกเพิ่มเติมว่า \"กำลังพยายามเตรียมกลับมาปล่อยอีกครั้งเร็วๆนี้\"
แต่ถ้าเราไปมองในฝั่ง Feedback Hub ของผู้ใช้งานต่างๆก็จะเห็นว่าผู้ใช้ Insider Program ที่ได้ลองเวอร์ชั่นดังกล่าวก็มีกระแสตอบกลับในแง่ลบอยู่มากมาย ตั้งแต่เรื่องแอปค้าง, ประสิทธิภาพร่วง, VPN เชื่อมต่อไม่ได้ ฯลฯ โดยผู้ใช้บางคนถึงขั้นถล่ม Social Media ว่า \"นี่คือหายนะครั้งใหญ่ที่สุด\" ", '[https://www.overclockzone.com/_admin/covercontent/9751-1718178012.jpg](https://www.overclockzone.com/_admin/covercontent/9751-1718178012.jpg)'],
            ['AMD เปิดตัวการ์ดจอ Radeon RX 7400 อย่างเป็นทางการ พร้อมหน่วยประมวลผล 28 คอร์ แรม GDDR6 8 GB และกินไฟ TBP 55W', 'GPU', 'AMD เปิดตัวการ์ดจอ Radeon RX 7400 อย่างเป็นทางการ พร้อมหน่วยประมวลผล 28 คอร์ แรม GDDR6 8 GB และกินไฟ TBP 55W', "AMD เปิดตัวการ์ดจอ Radeon RX 7400 ที่ใช้สถาปัตยกรรม RDNA 3 โดดเด่นด้วยจำนวนคอร์ 1792 Shaders, 28 Ray Accelerators, หน่วยความจำ GDDR6 8 GB ความเร็ว 10.8 Gbps โดยทาง AMD เปิดตัวการ์ดจอ Radeon PRO W7400 และ Radeon RX 7400 ไปเมื่อไม่นานนี้แทบไม่มีความแตกต่างกันเลยในเรื่องของสเปคทั้งสองรุ่น โดยใช้สถาปัตยกรรม RDNA 3 เหมือนกันและ RX 7400 เป็นการ์ดจอสำหรับเล่นเกมและ PRO 7400 โดยมุ่งเป้าไปที่กลุ่มผู้ใช้งานทั่วไปที่เน้นการทำงานเป็นหลัก สำหรับ Radeon RX 7400 ใช้พลังงานเพียง 55 วัตต์ จึงเหมาะอย่างยิ่งสำหรับโซลูชันสำเร็จรูป โดยเฉพาะโซลูชันระดับเริ่มต้น สำหรับราคายังไม่ทราบครับน่าจะไม่แพงระดับ 4-5พันบาทต้นๆ หรืออาจจะใช้ในเครื่องประกอบ OEM เท่านั้น", '[https://www.vmodtech.com/th/news/amd-radeon-rx-7400](https://www.vmodtech.com/th/news/amd-radeon-rx-7400)', '[https://www.vmodtech.com/main/wp-content/uploads/2025/08/10/amd-radeon-rx-7400/amd-radeon-rx-7400.jpg](https://www.vmodtech.com/main/wp-content/uploads/2025/08/10/amd-radeon-rx-7400/amd-radeon-rx-7400.jpg)'],
            ['ROG THOR 1600W Titanium III', 'HARDWARE', 'มาพร้อม GaN MOSFET, ระบบ "GPU-First" สำหรับการปรับแรงดันไฟอัจฉริยะ และจอ OLED แม่เหล็ก ROG Thor 1600W Titanium III มอบประสิทธิภาพสูงสุดและความเสถียรให้กับการประกอบคอมพิวเตอร์ระดับไฮเอนด์', "มาพร้อม GaN MOSFET, ระบบ \"GPU-First\" สำหรับการปรับแรงดันไฟอัจฉริยะ และจอ OLED แม่เหล็ก ROG Thor 1600W Titanium III มอบประสิทธิภาพสูงสุดและความเสถียรให้กับการประกอบคอมพิวเตอร์ระดับไฮเอนด์
GaN MOSFET: ประหยัดพลังงานมากขึ้นถึง 30% เมื่อเทียบกับ MOSFET ทั่วไป และจัดวางภายในให้ระบายความร้อนได้ดียิ่งขึ้น
\"GPU-First\" Voltage Sensing: ปรับแรงดันไฟให้การ์ดจอได้ดีขึ้นสูงสุดถึง 45% ทำให้การเล่นเกมลื่นไหลและมีประสิทธิภาพสูง
Magnetic OLED Display: แสดงการใช้พลังงานแบบเรียลไทม์ และสามารถปรับตำแหน่งจอได้ตามการติดตั้ง PSU
Turbo Mode: ใช้วัสดุเกรดพรีเมียมและพัดลมปรับแต่งพิเศษ เพื่อรองรับการใช้พลังงานสูงสุดในบางช่วงเวลา
ROG Heatsinks และโครงสร้างอะลูมิเนียมเต็มตัว: ช่วยระบายความร้อนได้อย่างมีประสิทธิภาพ ทำให้ระบบทำงานเย็น
Dual-ball Fan Bearings: พัดลมมีอายุการใช้งานยาวนานกว่าระบบลูกปืนแบบทั่วไปถึง 2 เท่า
รองรับ ATX 3.1: รองรับมาตรฐาน ATX 3.1 เพื่อควบคุมแรงดันไฟและกระแสได้อย่างเสถียรสำหรับฮาร์ดแวร์รุ่นล่าสุด
สายโมดูลาร์แบบ Etched Modular: ใช้วัสดุพรีเมียมเพื่อการจัดการสายไฟได้ง่ายและปลอดภัย
มาตรฐาน 80 PLUS & Cybenetics Titanium Certified: ใช้คาปาซิเตอร์คุณภาพสูงและส่วนประกอบระดับพรีเมียม เพื่อประสิทธิภาพการจ่ายไฟสูงสุด
รับประกัน 10 ปี", '[https://rog.asus.com/power-supply-units/rog-thor/rog-thor-1600t3-gaming/](https://rog.asus.com/power-supply-units/rog-thor/rog-thor-1600t3-gaming/)', '[https://dlcdnwebimgs.asus.com/gain/7A66D029-CC16-40F7-9913-D263965D77FA/w717/h525/fwebp](https://dlcdnwebimgs.asus.com/gain/7A66D029-CC16-40F7-9913-D263965D77FA/w717/h525/fwebp)'],
            ['NVIDIA เปิดตัว GeForce RTX 5050 – สเปก เทคโนโลยี และราคา', 'GPU', 'NVIDIA เปิดตัว GeForce RTX 5050 – สเปก เทคโนโลยี และราคา', "NVIDIA เปิดตัว GeForce RTX 5050 การ์ดจอราคาเริ่มต้นเพียง $249 ที่ใช้สถาปัตยกรรม Blackwell, มี 2,560 CUDA Cores และ 8 GB GDDR6 (320 GB/s) มุ่งเน้นกลุ่มงบประหยัดแต่รองรับเทคโนโลยีใหม่ เช่น DLSS 4 และ Ray Tracing รุ่นล่าสุด โดยอ้างว่าสามารถแรงกว่า RTX 3050 ราว 60% ในโหมดเรนเดอร์ปกติ และสูงสุด 4 เท่าเมื่อใช้ DLSS แต่ยังหมดตัวต้าน RTX 4060 เล็กน้อย พร้อมวางขายช่วงครึ่งหลังของกรกฎาคมนี้ รุ่นแล็ปท็อปเริ่มต้นที่ $999 แต่ควรรอรีวิวจากสื่อก่อนประกอบการตัดสินใจ", '[https://www.nvidia.com/th-th/geforce/graphics-cards/50-series/rtx-5050/](https://www.nvidia.com/th-th/geforce/graphics-cards/50-series/rtx-5050/)', '[https://www.nvidia.com/content/nvidiaGDC/th/th_TH/geforce/graphics-cards/50-series/rtx-5050/_jcr_content/root/responsivegrid/nv_container_copy_231026058/nv_container/nv_image.coreimg.100.630.jpeg/1750247728543/geforce-rtx-50-series-architecture-ari.jpeg](https://www.nvidia.com/content/nvidiaGDC/th/th_TH/geforce/graphics-cards/50-series/rtx-5050/_jcr_content/root/responsivegrid/nv_container_copy_231026058/nv_container/nv_image.coreimg.100.630.jpeg/1750247728543/geforce-rtx-50-series-architecture-ari.jpeg)'],
            ['ไอเดียบรรเจิด! คนไทยหัวกะทิสร้างเคสคอมพ์โฉมใหม่ ดีไซน์ ค้อนธอร์', 'HARDWERE', 'คนไทยเจ๋ง! ออกแบบเคสคอมพิวเตอร์ “ค้อนธอร์” โชว์ไอเดียระดับโลก', "คุณสุเชาว์ เภาพงษ์ นักออกแบบชาวไทย สร้างสรรค์ เคสคอมพิวเตอร์ทรงค้อนโยเนียร์ ได้แรงบันดาลใจจากเทพเจ้าธอร์ นำผลงานโชว์ในงาน Computex 2015 ประเทศไต้หวัน และคว้ารางวัล ชนะเลิศ CoreX 2Furious Project จากเวที Thermaltake CaseMOD Invitational Season 1 ท่ามกลางผู้เข้าแข่งขันจาก 7 ประเทศ กลายเป็นอีกหนึ่งความภาคภูมิใจของไทยในเวทีระดับโลก", '[https://www.thairath.co.th/news/tech/504675](https://www.thairath.co.th/news/tech/504675)', '[https://static.thairath.co.th/media/HCtHFA7ele6Q2dULVTHrwt2j9h1VNgIryqbZ1kPtiEqcC8sPuhiITjimmDPbCzqKdq.webp](https://static.thairath.co.th/media/HCtHFA7ele6Q2dULVTHrwt2j9h1VNgIryqbZ1kPtiEqcC8sPuhiITjimmDPbCzqKdq.webp)'],
            ['นัก MOD คนไทยสร้างเคสคอมพิวเตอร์ POINT BLANK BARRETT RADEON RX480 BY Suchao', 'HARDWERE', 'นัก MOD คนไทยสร้างเคสคอมพิวเตอร์ POINT BLANK BARRETT RADEON RX480 BY Suchao', "กโมดิฟายชาวไทย Suchao Modding & Design สร้างสรรค์เคสคอมพิวเตอร์ทรง Barrett M82A1 ที่ได้แรงบันดาลใจจากเกม Point Blank ผลงานชิ้นนี้ไม่ใช่แค่หน้าตาเท่ แต่ใช้งานได้จริง ภายในประกอบด้วย ซีพียู AMD A10-7800, การ์ดจอ AMD Radeon RX 480 8GB, น้ำ-คูลลิ่งแบบ custom และฟีเจอร์เจ๋ง ๆ อย่าง “ทริกเกอร์” ที่เป็นปุ่มเปิดเครื่อง 
ThinkComputers.org
PC Gamer
ExtremeIT
ผลงานถูกเผยแพร่ในเว็บ Extreme IT และได้รับการพูดถึงในระดับสากล รวมถึงถูกยกให้เป็นหนึ่งใน “Build of the Week” บน PC Gamer ด้วยความคิดสร้างสรรค์และฝีมือที่ไม่ธรรมดา", '[https://www.extremeit.com/mod-point-blank-barrett-radeon-rx480-suchao-amd-pb/](https://www.extremeit.com/mod-point-blank-barrett-radeon-rx480-suchao-amd-pb/)', '[https://www.extremeit.com/wp-content/uploads/2016/09/14305220_1261907593843087_6838200237261855326_o-696x464.jpg](https://www.extremeit.com/wp-content/uploads/2016/09/14305220_1261907593843087_6838200237261855326_o-696x464.jpg)'],
            ['Logitech เปิดตัว G915 X Series — คีย์บอร์ดเกมมิ่งบางเฉียบ พร้อมนวัตกรรมเต็มเปี่ยม', 'GPU', 'Logitech G เผยโฉม G915 X Series ในงาน Logi PLAY 2024 ด้วยคีย์บอร์ดเกมมิ่งโปรไฟล์ต่ำที่สุดของบริษัท ซึ่งมีความสูงเพียง 23 มม. เท่านั้น', "Logitech G เผยโฉม G915 X Series ในงาน Logi PLAY 2024 ด้วยคีย์บอร์ดเกมมิ่งโปรไฟล์ต่ำที่สุดของบริษัท ซึ่งมีความสูงเพียง 23 มม. เท่านั้น 
ir.logitech.com
GadgetMatch
รุ่นนี้มาพร้อมสวิตช์ Galvanic ใหม่ที่ใช้ก้าน POM แบบ cross-style ให้นิ่งขึ้นและเสียงน้อยลง, จุดกด (actuation point) ลดจาก 1.5 มม. เหลือ 1.3 มม. เพื่อการตอบสนองที่ไวขึ้น, และใช้ PBT keycaps แบบ double-shot ที่ทนทานกว่าและลดคราบมันจากนิ้ว 
news.logitech.com
GadgetMatch
ด้านการก่อสร้าง เพิ่มความหนาแผ่นอะลูมิเนียมบนตัวคีย์บอร์ดจาก 1.2 มม. เป็น 1.5 มม. เสริมโครงสร้างให้แข็งแรงแข็งแกร่งยิ่งขึ้น", '[https://news.logitech.com/press-releases/news-details/2024/Logitech-G-Introduces-the-G915-X-Series---The-Most-Advanced-Low-Profile-Gaming-Keyboard-Ever-Built/default.aspx](https://news.logitech.com/press-releases/news-details/2024/Logitech-G-Introduces-the-G915-X-Series---The-Most-Advanced-Low-Profile-Gaming-Keyboard-Ever-Built/default.aspx)', '[https://imagenes.elpais.com/resizer/v2/4FOAA5CHA5FEDMBZQRLVG7MNGE.jpg?auth=31ead8745594a874a7bdaa14db724d534b54483a4334a382bf3f031a6b4c3079&width=1200](https://imagenes.elpais.com/resizer/v2/4FOAA5CHA5FEDMBZQRLVG7MNGE.jpg?auth=31ead8745594a874a7bdaa14db724d534b54483a4334a382bf3f031a6b4c3079&width=1200)'],
        ];

        foreach ($rows as [$title,$category,$summary,$content,$sourceMd,$imageMd]) {
            $slugBase = Str::slug($title);              // ภาษาไทยอาจได้สตริงว่าง
            $slug = $slugBase !== '' ? $slugBase : Str::random(8);

            // กันชนซ้ำ
            $try = 1;
            while (News::where('slug', $slug)->exists()) {
                $slug = ($slugBase !== '' ? $slugBase : Str::random(8)).'-'.Str::lower(Str::random(4));
                if (++$try > 5) break;
            }

            News::create([
                'title'        => $title,
                'slug'         => $slug,
                'category'     => $this->normalizeCategory($category),
                'summary'      => $summary,
                'content'      => $content,
                'source_url'   => $this->toUrl($sourceMd), // แปลง Markdown → URL
                'image_url'    => $this->toUrl($imageMd),  // แปลง Markdown → URL
                'published_at' => now(),
            ]);
        }
    }
}