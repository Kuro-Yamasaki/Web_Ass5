<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>หน้าแรก - ระบบลงทะเบียนเรียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        palette: {
                            light: '#635985',
                            mid: '#443C68',
                            dark: '#393053',
                            bg: '#18122B'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="bg-palette-bg text-gray-200 p-4 md:p-8 min-h-screen flex flex-col items-center">
    <div class="w-full max-w-7xl mx-auto">

        <div class="flex justify-end mb-8 w-full">
            <nav class="bg-palette-dark border border-palette-mid px-2 py-2 rounded-full shadow-lg flex items-center gap-1 md:gap-2 relative z-20">
                <a href="index.php?action=home" class="px-4 py-2 rounded-full text-sm font-semibold bg-palette-light text-white transition-all">หน้าแรก</a>
                <a href="index.php?action=profile" class="px-4 py-2 rounded-full text-sm font-semibold text-gray-300 hover:bg-palette-mid hover:text-white transition-all">ข้อมูลนักเรียน</a>
                <a href="index.php?action=courses" class="px-4 py-2 rounded-full text-sm font-semibold text-gray-300 hover:bg-palette-mid hover:text-white transition-all">รายวิชา</a>
                <a href="index.php?action=logout" class="px-4 py-2 rounded-full text-sm font-semibold text-red-400 hover:bg-red-500/20 transition-all">ออกจากระบบ</a>
            </nav>
        </div>

        <div class="relative w-full max-w-5xl mx-auto bg-palette-dark/80 backdrop-blur-md border border-palette-mid rounded-[2.5rem] p-10 lg:p-20 shadow-2xl flex flex-col items-center justify-center text-center mt-4">
            <h1 class="relative z-10 text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 tracking-tight">
                สวัสดี <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#8b80b5] to-white"><?= htmlspecialchars($_SESSION['first_name'] ?? 'User') ?></span> 👋
            </h1>

            <p class="relative z-10 text-lg md:text-xl text-gray-300 max-w-2xl mb-10 leading-relaxed">
                ยินดีต้อนรับเข้าสู่ระบบจัดการการเรียนของคุณ ที่นี่คุณสามารถตรวจสอบรายวิชาที่เปิดสอนและจัดการข้อมูลการลงทะเบียนได้อย่างง่ายดาย
            </p>

            <a href="index.php?action=courses" class="relative z-10 group inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-300 bg-palette-light border border-palette-light rounded-full shadow-lg hover:bg-[#4d446b] hover:-translate-y-1">
                ดูรายวิชาที่เปิดสอน
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 w-full max-w-5xl mx-auto relative z-10">
            <a href="index.php?action=profile" class="bg-palette-dark/60 border border-palette-mid p-6 rounded-3xl hover:bg-palette-dark hover:border-palette-light transition-all duration-300 group flex items-start gap-5">
                <div>
                    <h3 class="text-white font-bold text-lg mb-1 group-hover:text-[#a59bcc] transition-colors">ข้อมูลนักเรียนและการลงทะเบียน</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">ตรวจสอบประวัติส่วนตัว และจัดการถอนรายวิชาที่คุณได้ทำการลงทะเบียนเรียนไว้แล้ว</p>
                </div>
            </a>
            <a href="index.php?action=courses" class="bg-palette-dark/60 border border-palette-mid p-6 rounded-3xl hover:bg-palette-dark hover:border-palette-light transition-all duration-300 group flex items-start gap-5">
                <div>
                    <h3 class="text-white font-bold text-lg mb-1 group-hover:text-[#a59bcc] transition-colors">รายวิชาที่เปิดสอนทั้งหมด</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">ค้นหาและลงทะเบียนรายวิชาใหม่ที่เปิดสอนในภาคการศึกษานี้ พร้อมดูรายชื่ออาจารย์ผู้สอน</p>
                </div>
            </a>
        </div>
    </div>
</body>

</html>