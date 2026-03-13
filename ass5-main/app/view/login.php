<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Sarabun', sans-serif; } </style>
</head>
<body class="bg-slate-900 min-h-screen flex items-center justify-center p-4">

<div class="bg-slate-800 p-8 md:p-10 rounded-2xl shadow-2xl border border-slate-700 w-full max-w-md transform transition-all hover:-translate-y-1">
    <h2 class="text-3xl font-bold text-indigo-400 text-center mb-8">ระบบลงทะเบียนเรียน</h2>
    <form action="index.php?action=doLogin" method="POST" class="space-y-5">
        <div>
            <input type="text" name="username" placeholder="Email" required 
                   class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white placeholder-slate-400 focus:bg-slate-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password" required 
                   class="w-full px-4 py-3 rounded-xl border border-slate-600 bg-slate-700 text-white placeholder-slate-400 focus:bg-slate-600 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-indigo-500/30 transition-all transform hover:-translate-y-0.5">
            เข้าสู่ระบบ
        </button>
        
        <button type="button" onclick="window.location.href='index.php?action=register_user'" 
                class="w-full bg-transparent text-slate-300 font-semibold py-3 rounded-xl border border-slate-600 hover:bg-slate-700 hover:text-white transition-all">
            สมัครสมาชิกใหม่
        </button>
    </form>
</div>

</body>
</html>