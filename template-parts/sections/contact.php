<!-- CONTACT -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-10 items-start">
            <div>
                <h2 class="text-3xl md:text-4xl font-extrabold"><?php echo esc_html(get_theme_mod('contact_title', 'Let\'s work together!')); ?></h2>
                <p class="mt-3 text-slate-600"><?php echo esc_html(get_theme_mod('contact_subtitle', 'Cho chúng tôi biết nhu cầu của bạn, team sẽ phản hồi ngay.')); ?></p>
                <ul class="mt-6 space-y-2 text-slate-700">
                    <li>✉️ <?php echo esc_html(get_theme_mod('contact_email', 'hello@fotoservices.com')); ?></li>
                    <li>📞 <?php echo esc_html(get_theme_mod('contact_phone', '+84 90 000 0000')); ?></li>
                    <li>🌐 <?php echo esc_html(get_theme_mod('contact_website', 'www.fotoservices.com')); ?></li>
                </ul>
                <?php if (isset($_GET['contact_sent'])) : ?>
                    <div class="mt-8 p-4 rounded-xl bg-green-50 border border-green-200 text-sm text-green-600">
                        <?php echo esc_html(get_theme_mod('contact_success_message', 'Cảm ơn bạn! Chúng tôi sẽ phản hồi sớm nhất.')); ?>
                    </div>
                <?php endif; ?>
            </div>
            <form method="POST" class="bg-slate-50 rounded-2xl p-6 border border-slate-200 shadow-smooth">
                <label class="block text-sm font-medium"><?php echo esc_html(get_theme_mod('contact_name_label', 'Tên của bạn')); ?></label>
                <input name="contact_name" required class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2" placeholder="<?php echo esc_attr(get_theme_mod('contact_name_placeholder', 'Nguyen Nguyen')); ?>" />

                <label class="block text-sm font-medium mt-4"><?php echo esc_html(get_theme_mod('contact_email_label', 'Email')); ?></label>
                <input name="contact_email" required type="email" class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2" placeholder="<?php echo esc_attr(get_theme_mod('contact_email_placeholder', 'you@email.com')); ?>" />

                <label class="block text-sm font-medium mt-4"><?php echo esc_html(get_theme_mod('contact_message_label', 'Nội dung')); ?></label>
                <textarea name="contact_message" rows="4" class="mt-1 w-full rounded-xl border border-slate-300 px-4 py-2" placeholder="<?php echo esc_attr(get_theme_mod('contact_message_placeholder', 'Mô tả nhu cầu, số lượng ảnh, deadline…')); ?>"></textarea>

                <button name="contact_form_submit" type="submit" class="mt-5 w-full rounded-xl bg-indigo-600 text-white py-2.5 font-semibold hover:bg-indigo-700"><?php echo esc_html(get_theme_mod('contact_button_text', 'Gửi yêu cầu')); ?></button>
            </form>
        </div>
    </div>
</section>