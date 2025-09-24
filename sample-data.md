# Sample Data cho WordPress Theme

## Services (Post Type: service)

### Service 1: HDR/Flambient
- **Title:** HDR/Flambient
- **Content/Excerpt:** Blend 3–5 phơi sáng, cân bằng trắng, kéo chi tiết cửa sổ tự nhiên, thẳng méo, xóa dây điện.
- **Service Icon:** 🖼️
- **Service Features:**
```
Window Pull tự nhiên
Color cast control
Sharpen sạch sẽ
```

### Service 2: Virtual Staging
- **Title:** Virtual Staging
- **Content/Excerpt:** Dàn dựng nội thất ảo (phòng khách, ngủ, sân vườn), nhiều phong cách: modern, scandinavian, coastal…
- **Service Icon:** 🏡
- **Service Features:**
```
3–5 set/ảnh
Bố cục hợp lý
Bóng/ánh sáng chân thực
```

### Service 3: Floor Plan & Site Plan
- **Title:** Floor Plan & Site Plan
- **Content/Excerpt:** Vẽ 2D/3D, quy chuẩn kích thước, hướng, chú thích phòng; xuất PNG/PDF/SVG.
- **Service Icon:** 🧭
- **Service Features:**
```
Clean vector
Branded style
File gốc để sửa
```

### Service 4: Sky/Twilight Replace
- **Title:** Sky/Twilight Replace
- **Content/Excerpt:** Thay bầu trời & twilight tự nhiên, giữ chi tiết kiến trúc, ánh sáng phản chiếu hợp lý.
- **Service Icon:** 🌅
- **Service Features:**
```
Nhiều preset
Không giả
Consistent màu
```

### Service 5: Reels/Shorts
- **Title:** Reels/Shorts
- **Content/Excerpt:** Cắt dựng 15–60s, nhạc trend, subtitle rõ, hook mạnh — phù hợp agent marketing.
- **Service Icon:** 🎥
- **Service Features:**
```
Ratio 9:16/1:1/16:9
Logo & brand kit
Export đa nền tảng
```

### Service 6: Remove Objects
- **Title:** Remove Objects
- **Content/Excerpt:** Loại bỏ vật thể 1–10+ items, dọn dây, thùng rác, vết bẩn; đi texture & ánh sáng mượt.
- **Service Icon:** 🧹
- **Service Features:**
```
Seamless retouch
Giữ chi tiết
Soát lỗi kỹ
```

---

## Portfolio (Post Type: portfolio)

### Portfolio 1: Living Room HDR
- **Title:** Living Room HDR Enhancement
- **Before Image:** https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=1600&auto=format&fit=crop
- **After Image:** https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=1600&auto=format&fit=crop

### Portfolio 2: Kitchen Renovation
- **Title:** Kitchen Lighting Enhancement
- **Before Image:** https://images.unsplash.com/photo-1519710164239-da123dc03ef4?q=80&w=1600&auto=format&fit=crop
- **After Image:** https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=1600&auto=format&fit=crop

---

## Testimonials (Post Type: testimonial)

### Testimonial 1
- **Title:** Ben Sydney Review
- **Content:** "Ảnh consistent, window pull đẹp, giao nhanh 12h."
- **Testimonial Rating:** 5
- **Testimonial Author:** Ben
- **Testimonial Location:** Sydney

### Testimonial 2
- **Title:** Mark Melbourne Review
- **Content:** "Staging tự nhiên, khách xem là mê. Giá hợp lý."
- **Testimonial Rating:** 5
- **Testimonial Author:** Mark
- **Testimonial Location:** Melbourne

### Testimonial 3
- **Title:** Brian California Review
- **Content:** "Support nhiệt tình, sửa nhanh đúng ý."
- **Testimonial Rating:** 5
- **Testimonial Author:** Brian
- **Testimonial Location:** California

---

## Hướng dẫn nhập data:

1. **Tạo Services:**
   - Đi tới WordPress Admin > Services > Add New
   - Nhập Title và Content
   - Trong Service Details box, nhập Icon và Features (mỗi feature 1 dòng)

2. **Tạo Portfolio:**
   - Đi tới WordPress Admin > Portfolio > Add New
   - Nhập Title
   - Trong Portfolio Details box, nhập Before Image URL và After Image URL

3. **Tạo Testimonials:**
   - Đi tới WordPress Admin > Testimonials > Add New
   - Nhập Title và Content (testimonial text)
   - Trong Testimonial Details box, nhập Rating (1-5), Author và Location

4. **Setup Menu:**
   - Đi tới Appearance > Menus
   - Tạo menu mới với các items:
     - Custom Links: #services (Label: Dịch vụ)
     - Custom Links: #beforeafter (Label: Before/After)
     - Custom Links: #gallery (Label: Gallery)
     - Custom Links: #pricing (Label: Bảng giá)
   - Assign menu này vào "Primary Menu" location