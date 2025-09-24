<!-- FOOTER -->
<footer class="py-10 bg-slate-900 text-white">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="text-white/80">© <span id="year"></span> Foto Services. All rights reserved.</div>
        <div class="text-white/60 text-sm">Made for demo • Inspired by beepec.com layout</div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
// Before/After range handler
function moveBA(input){
    const wrap = input.parentElement;
    const after = wrap.querySelector('.ba-after');
    const handle = wrap.querySelector('.ba-handle');
    const pct = input.value;
    after.style.width = pct + '%';
    handle.style.left = pct + '%';
    const dot = wrap.querySelector('.ba-dot');
    dot.style.left = pct + '%';
}
document.getElementById('year').textContent = new Date().getFullYear();
</script>

</body>
</html>