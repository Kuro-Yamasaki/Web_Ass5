<?php
    if (!isset($db)) {
        $db = (new Database())->getConnection();
    }
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ข้อมูลนักเรียน</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Sarabun', sans-serif; } </style>
</head>
<body class="bg-slate-900 text-slate-200 p-4 md:p-8 min-h-screen">

<div class="max-w-7xl mx-auto"> <div class="flex justify-end mb-8 w-full">
        <nav class="bg-slate-800 border border-slate-700 px-2 py-2 rounded-full shadow-lg flex items-center gap-1 md:gap-2">
            <a href="index.php?action=home" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-400 hover:bg-slate-700 hover:text-white transition-all">หน้าแรก</a>
            <a href="index.php?action=profile" class="px-4 py-2 rounded-full text-sm font-semibold bg-indigo-500/20 text-indigo-400 border border-indigo-500/30 transition-all">ข้อมูลนักเรียน</a>
            <a href="index.php?action=courses" class="px-4 py-2 rounded-full text-sm font-semibold text-slate-400 hover:bg-slate-700 hover:text-white transition-all">รายวิชา</a>
            <a href="index.php?action=logout" class="px-4 py-2 rounded-full text-sm font-semibold text-red-400 hover:bg-red-500/20 transition-all">ออกจากระบบ</a>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <div class="lg:col-span-4 bg-slate-800 p-6 md:p-8 rounded-3xl shadow-xl border border-slate-700">
            <h1 class="text-2xl font-bold text-white border-l-4 border-indigo-500 pl-4 mb-6">ข้อมูลนักเรียน</h1>
            
            <div class="flex flex-col gap-4"> <div class="bg-slate-700/50 p-4 rounded-xl border border-slate-600/50">
                    <p class="text-sm text-slate-400 mb-1">ชื่อ</p>
                    <p class="font-semibold text-lg text-white"><?= htmlspecialchars($user['first_name'] ?? 'ไม่พบข้อมูล') ?></p>
                </div>
                <div class="bg-slate-700/50 p-4 rounded-xl border border-slate-600/50">
                    <p class="text-sm text-slate-400 mb-1">นามสกุล</p>
                    <p class="font-semibold text-lg text-white"><?= htmlspecialchars($user['last_name'] ?? 'ไม่พบข้อมูล') ?></p>
                </div>
                <div class="bg-slate-700/50 p-4 rounded-xl border border-slate-600/50">
                    <p class="text-sm text-slate-400 mb-1">วันเกิด</p>
                    <p class="font-semibold text-lg text-white"><?= htmlspecialchars($user['birthdate'] ?? '0000-00-00') ?></p>
                </div>
                <div class="bg-slate-700/50 p-4 rounded-xl border border-slate-600/50">
                    <p class="text-sm text-slate-400 mb-1">เบอร์โทรศัพท์</p>
                    <p class="font-semibold text-lg text-white"><?= htmlspecialchars($user['phone'] ?? '0000000000') ?></p>
                </div>
            </div>
        </div>

        <div class="lg:col-span-8 bg-slate-800 p-6 md:p-8 rounded-3xl shadow-xl border border-slate-700">
            <h2 class="text-2xl font-bold text-white border-l-4 border-purple-500 pl-4 mb-6">วิชาที่ลงทะเบียนเรียน</h2>
            
            <div class="overflow-x-auto rounded-xl border border-slate-700">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-700 text-purple-300 text-sm uppercase tracking-wider">
                            <th class="p-4 whitespace-nowrap">รหัสวิชา</th>
                            <th class="p-4 whitespace-nowrap">ชื่อวิชา</th>
                            <th class="p-4 whitespace-nowrap">อาจารย์ผู้สอน</th>
                            <th class="p-4 whitespace-nowrap">วันที่ลงทะเบียน</th> 
                            <th class="p-4 text-center whitespace-nowrap">ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700 bg-slate-800">
                        <?php if (!empty($my_courses)): ?>
                            <?php foreach($my_courses as $mc): ?>
                            <tr class="hover:bg-slate-700/50 transition-colors">
                                <td class="p-4 font-medium text-slate-200 whitespace-nowrap"><?= htmlspecialchars($mc['course_code'] ?? '-') ?></td>
                                <td class="p-4 text-slate-300"><?= htmlspecialchars($mc['course_name'] ?? '-') ?></td>
                                <td class="p-4 text-slate-400 whitespace-nowrap"><?= htmlspecialchars($mc['instructor'] ?? '-') ?></td>
                                <td class="p-4 text-slate-500 text-sm whitespace-nowrap"><?= date('d/m/Y H:i', strtotime($mc['created_at'])) ?></td>
                                <td class="p-4 text-center">
                                    <a href="#" onclick="if(confirm('ยืนยันการถอนวิชา?')) window.location.href='index.php?action=withdraw&id=<?= $mc['id'] ?>'" 
                                       class="inline-block border border-red-500/50 text-red-400 hover:bg-red-500 hover:text-white text-sm font-semibold px-4 py-2 rounded-lg transition-all">
                                        ถอนรายวิชา
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="p-10 text-center text-slate-500 bg-slate-800/50">
                                    <p class="text-lg">ยังไม่ได้ลงทะเบียนวิชาใดๆ</p>
                                    <a href="index.php?action=courses" class="text-indigo-400 hover:text-indigo-300 hover:underline mt-2 inline-block transition-all">ไปลงทะเบียนกันเลย</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</body>
</html>