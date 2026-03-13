<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Sarabun', sans-serif; } </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">

<div class="bg-slate-800 p-8 md:p-10 rounded-2xl shadow-2xl border border-slate-700 w-full max-w-lg">
    <h2 class="text-3xl font-bold text-indigo-400 text-center mb-8">สมัครสมาชิกใหม่</h2>
    <form action="index.php?action=doRegister" method="POST" class="space-y-4">
        <input type="text" name="username" placeholder="Email" required 
               class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white placeholder-slate-400 focus:bg-slate-600 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
        
        <input type="password" name="password" placeholder="Password" required 
               class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white placeholder-slate-400 focus:bg-slate-600 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
        
        <div class="flex flex-col md:flex-row gap-4">
            <input type="text" name="first_name" placeholder="ชื่อจริง" required 
                   class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white placeholder-slate-400 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
            <input type="text" name="last_name" placeholder="นามสกุล" required 
                   class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white placeholder-slate-400 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
        </div>
        
        <div class="flex flex-col text-left">
            <label class="text-sm text-slate-400 ml-2 mb-1">วันเกิด:</label>
            <input type="date" name="birthdate" required 
                   class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all [color-scheme:dark]">
        </div>
        
        <input type="text" name="phone" placeholder="เบอร์โทรศัพท์" required 
               class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white placeholder-slate-400 focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
        
        <div class="pt-4 space-y-3">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-indigo-500/30 transition-all">
                ยืนยันการสมัคร
            </button>
            <button type="button" onclick="window.location.href='index.php?action=login'" 
                    class="w-full bg-slate-700 text-slate-300 font-semibold py-3 rounded-xl hover:bg-slate-600 transition-all">
                กลับไปหน้าล็อกอิน
            </button>
        </div>
    </form>
</div>

</body>
</html>