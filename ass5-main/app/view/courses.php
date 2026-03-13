<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายวิชาที่เปิดให้ลงทะเบียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Sarabun', sans-serif; } </style>
</head>
<body class="bg-slate-900 text-slate-200 p-4 md:p-8 min-h-screen">

<div class="max-w-7xl mx-auto">
    
    <div class="flex justify-end mb-8 w-full">
        <nav class="bg-slate-800 border border-slate-700 px-2 py-2 rounded-full shadow-lg flex items-center gap-1 md:gap-2">
            <a href="index.php?action=home" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-400 hover:bg-slate-700 hover:text-white transition-all">หน้าแรก</a>
            <a href="index.php?action=profile" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-400 hover:bg-slate-700 hover:text-white transition-all">ข้อมูลนักเรียน</a>
            <a href="index.php?action=courses" class="px-4 py-2 rounded-full text-sm font-semibold bg-indigo-500/20 text-indigo-400 border border-indigo-500/30 transition-all">รายวิชา</a>
            <a href="index.php?action=logout" class="px-4 py-2 rounded-full text-sm font-semibold text-red-400 hover:bg-red-500/20 transition-all">ออกจากระบบ</a>
        </nav>
    </div>

    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-white border-l-4 border-indigo-500 pl-4 mb-2">รายวิชาที่เปิดให้ลงทะเบียน</h1>
            <p class="text-slate-400 pl-5">เลือกรายวิชาที่คุณสนใจเพื่อลงทะเบียนเรียนในภาคการศึกษานี้</p>
        </div>
        
        <a href="index.php?action=add_course" class="inline-flex items-center justify-center bg-emerald-600/20 text-emerald-400 border border-emerald-500/30 hover:bg-emerald-500 hover:text-white px-6 py-3 rounded-xl font-bold transition-all duration-300 shadow-lg hover:shadow-emerald-500/30 group">
            <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            เพิ่มวิชาใหม่
        </a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <?php 
        $my_ids = !empty($my_courses) ? array_column($my_courses, 'id') : [];
        if (!empty($courses)):
            foreach($courses as $c): 
        ?>
        
        <div class="bg-slate-800/80 backdrop-blur-sm p-6 rounded-3xl shadow-xl border border-slate-700/50 hover:border-indigo-500/50 transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full relative overflow-hidden group">
            
            <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-500/10 to-purple-500/10 rounded-bl-[100px] -z-10 group-hover:scale-110 transition-transform"></div>

            <div class="flex justify-between items-start mb-4">
                <span class="inline-block px-3 py-1 bg-indigo-500/20 text-indigo-300 text-xs font-bold rounded-full tracking-wider border border-indigo-500/20">
                    <?= htmlspecialchars($c['course_code'] ?? '-') ?>
                </span>
            </div>

            <h3 class="text-xl font-bold text-white mb-2 leading-tight"><?= htmlspecialchars($c['course_name'] ?? '-') ?></h3>

            <p class="text-slate-400 text-sm flex items-center mb-6 flex-grow">
                <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <?= htmlspecialchars($c['instructor'] ?? '-') ?>
            </p>

            <div class="mt-auto pt-4 border-t border-slate-700/50">
                <?php if(in_array($c['id'], $my_ids)): ?>
                    <span class="flex items-center justify-center w-full py-3 rounded-xl text-sm font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 cursor-default">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        ลงทะเบียนแล้ว
                    </span>
                <?php else: ?>
                    <button onclick="if(confirm('ยืนยันการลงทะเบียนรายวิชา <?= htmlspecialchars($c['course_code']) ?>?')) window.location.href='index.php?action=register&id=<?= $c['id'] ?>'" 
                       class="w-full flex items-center justify-center bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold py-3 rounded-xl shadow-lg transition-all transform hover:-translate-y-0.5">
                        ลงทะเบียนเรียน
                    </button>
                <?php endif; ?>
            </div>
            
        </div>
        <?php 
            endforeach; 
        else: 
        ?>
            <div class="col-span-1 md:col-span-2 lg:col-span-3 py-16 text-center bg-slate-800/50 rounded-3xl border border-slate-700/50">
                <p class="text-xl text-slate-400">ยังไม่มีวิชาเปิดสอนในขณะนี้</p>
            </div>
        <?php endif; ?>
        
    </div>
</div>

</body>
</html>