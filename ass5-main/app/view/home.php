<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>หน้าแรก - ระบบลงทะเบียนเรียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-900 text-slate-200 p-4 md:p-8 min-h-screen flex flex-col items-center">

    <div class="w-full max-w-7xl mx-auto">

        <div class="flex justify-end mb-8 w-full">
            <nav class="bg-slate-800 border border-slate-700 px-2 py-2 rounded-full shadow-lg flex items-center gap-1 md:gap-2 relative z-20">
                <a href="index.php?action=home" class="px-4 py-2 rounded-full text-sm font-semibold bg-indigo-500/20 text-indigo-400 border border-indigo-500/30 transition-all">หน้าแรก</a>
                <a href="index.php?action=profile" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-400 hover:bg-slate-700 hover:text-white transition-all">ข้อมูลนักเรียน</a>
                <a href="index.php?action=courses" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-400 hover:bg-slate-700 hover:text-white transition-all">รายวิชา</a>
                <a href="index.php?action=logout" class="px-4 py-2 rounded-full text-sm font-semibold text-red-400 hover:bg-red-500/20 transition-all">ออกจากระบบ</a>
            </nav>
        </div>

        <div class="relative w-full max-w-5xl mx-auto overflow-hidden bg-slate-800/40 backdrop-blur-md border border-slate-700/50 rounded-[2.5rem] p-10 lg:p-20 shadow-2xl flex flex-col items-center justify-center text-center mt-4">

            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-2xl h-64 bg-indigo-500/20 blur-[100px] rounded-full pointer-events-none z-0"></div>

            <div class="relative z-10 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800 border border-slate-600/50 text-indigo-300 text-sm font-medium mb-8 shadow-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                ระบบลงทะเบียนเรียนเปิดใช้งานแล้ว
            </div>

            <h1 class="relative z-10 text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6 tracking-tight">
                สวัสดี <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400"><?= htmlspecialchars($_SESSION['first_name'] ?? 'User') ?></span> 👋
            </h1>

            <p class="relative z-10 text-lg md:text-xl text-slate-400 max-w-2xl mb-10 leading-relaxed">
                ยินดีต้อนรับเข้าสู่ระบบจัดการการเรียนของคุณ ที่นี่คุณสามารถตรวจสอบรายวิชาที่เปิดสอนและจัดการข้อมูลการลงทะเบียนได้อย่างง่ายดาย
            </p>

            <a href="index.php?action=courses" class="relative z-10 group inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-300 bg-indigo-600 border border-indigo-500/50 rounded-full shadow-[0_0_20px_rgba(79,70,229,0.3)] hover:bg-indigo-500 hover:shadow-[0_0_30px_rgba(79,70,229,0.5)] hover:-translate-y-1">
                ดูรายวิชาที่เปิดสอน
                <svg class="w-5 h-5 ml-2 -mr-1 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 w-full max-w-5xl mx-auto relative z-10">
            <a href="index.php?action=profile" class="bg-slate-800/40 border border-slate-700/50 p-6 rounded-3xl hover:bg-slate-700/60 hover:border-slate-600 transition-all duration-300 group flex items-start gap-5">
                <div class="p-4 bg-purple-500/10 border border-purple-500/20 rounded-2xl text-purple-400 group-hover:bg-purple-500/20 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1 group-hover:text-purple-300 transition-colors">ข้อมูลนักเรียนและการลงทะเบียน</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">ตรวจสอบประวัติส่วนตัว และจัดการถอนรายวิชาที่คุณได้ทำการลงทะเบียนเรียนไว้แล้ว</p>
                </div>
            </a>

            <a href="index.php?action=courses" class="bg-slate-800/40 border border-slate-700/50 p-6 rounded-3xl hover:bg-slate-700/60 hover:border-slate-600 transition-all duration-300 group flex items-start gap-5">
                <div class="p-4 bg-indigo-500/10 border border-indigo-500/20 rounded-2xl text-indigo-400 group-hover:bg-indigo-500/20 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1 group-hover:text-indigo-300 transition-colors">รายวิชาที่เปิดสอนทั้งหมด</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">ค้นหาและลงทะเบียนรายวิชาใหม่ที่เปิดสอนในภาคการศึกษานี้ พร้อมดูรายชื่ออาจารย์ผู้สอน</p>
                </div>
            </a>
        </div>

    </div>

</body>

</html>