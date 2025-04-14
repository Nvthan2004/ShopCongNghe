<div class="container-fuild mt-5 contact-section">
  <h2 class="text-center fw-bold section-title">Liên Hệ Với Chúng Tôi</h2>
  
  <div class="row g-4 mx-5">
    <!-- Form liên hệ -->
    <div class="col-lg-6">
      <div class="contact-card">
        <div class="card-body p-4">
          <h4 class="mb-4 fw-bold text-primary"><i class="bi bi-envelope-paper me-2"></i>Gửi Tin Nhắn</h4>
          
          <form>
            <div class="row g-3">
              <!-- Tên -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="name" class="form-label fw-medium">Họ và tên</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên" required>
                  </div>
                </div>
              </div>
              
              <!-- Email -->
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label fw-medium">Email</label>
                  <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email" required>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Số điện thoại -->
            <div class="mb-3">
              <label for="phone" class="form-label fw-medium">Số điện thoại</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                <input type="tel" class="form-control" id="phone" placeholder="Nhập số điện thoại" required>
              </div>
            </div>
            
            <!-- Chủ đề -->
            <div class="mb-3">
              <label for="subject" class="form-label fw-medium">Chủ đề</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-chat-left-text"></i></span>
                <select class="form-select" id="subject" required>
                  <option value="" selected disabled>Chọn chủ đề</option>
                  <option value="support">Hỗ trợ kỹ thuật</option>
                  <option value="feedback">Góp ý sản phẩm</option>
                  <option value="partnership">Hợp tác kinh doanh</option>
                  <option value="other">Khác</option>
                </select>
              </div>
            </div>
            
            <!-- Tin nhắn -->
            <div class="mb-4">
              <label for="message" class="form-label fw-medium">Tin nhắn</label>
              <div class="input-group">
                <span class="input-group-text bg-light"><i class="bi bi-pencil-square"></i></span>
                <textarea class="form-control" id="message" rows="5" placeholder="Nhập nội dung tin nhắn" required></textarea>
              </div>
            </div>
            
            <!-- Nút gửi -->
            <button type="submit" class="btn btn-contact w-100">
              <i class="bi bi-send me-2"></i>Gửi Tin Nhắn
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- Thông tin liên hệ và Bản đồ -->
    <div class="col-lg-6">
      <div class="contact-card">
        <div class="card-body p-0">
          <!-- Map -->
          <div class="map-container">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345098795!2d144.96305771531694!3d-37.81362797975195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0x5045675218cee40!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1614992969895!5m2!1sen!2s" 
              width="100%" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy">
            </iframe>
          </div>

          <!-- Info -->
          <div class="p-4 info-section">
            <h4 class="mb-4 fw-bold text-primary"><i class="bi bi-geo-alt me-2"></i>Thông Tin Liên Hệ</h4>
            
            <div class="d-flex info-box">
              <div class="info-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div>
                <h5 class="fw-bold">Địa Chỉ</h5>
                <p class="mb-0">123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh</p>
              </div>
            </div>
            
            <div class="d-flex info-box">
              <div class="info-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <div>
                <h5 class="fw-bold">Hotline</h5>
                <p class="mb-0">0123 456 789</p>
              </div>
            </div>
            
            <div class="d-flex info-box">
              <div class="info-icon">
                <i class="bi bi-envelope"></i>
              </div>
              <div>
                <h5 class="fw-bold">Email</h5>
                <p class="mb-0">support@shopcongnghe.vn</p>
              </div>
            </div>
            
            <div class="d-flex info-box">
              <div class="info-icon">
                <i class="bi bi-clock"></i>
              </div>
              <div>
                <h5 class="fw-bold">Giờ Làm Việc</h5>
                <p class="mb-0">Thứ 2 - Thứ 7: 8:00 - 20:00<br>Chủ nhật: 8:00 - 18:00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH D:\HK6\Back-end 2\Nhóm B\example-app\resources\views/user/contact.blade.php ENDPATH**/ ?>