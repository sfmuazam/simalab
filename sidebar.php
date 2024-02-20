          <div class="sidebar-menu">
            <ul class="menu">
              <li class="sidebar-title">Menu</li>

              <li class="sidebar-item <?php echo ($currentPage === 'default') ? 'active' : ''; ?>">
                <a href="index.php" class="sidebar-link">
                  <i class="bi bi-pie-chart-fill"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="sidebar-item <?php echo ($currentPage === 'info_laboratorium' || $currentPage === 'organisasi') ? 'active' : ''; ?> has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Laboratorium</span>
                </a>
                <ul class="submenu <?php echo ($currentPage === 'info_laboratorium' || $currentPage === 'organisasi') ? 'active' : ''; ?>">
                  <li class="submenu-item <?php echo ($currentPage === 'info_laboratorium') ? 'active' : ''; ?>">
                    <a href="index.php?r=info_laboratorium">Informasi Laboratorium</a>
                  </li>
                  <li class="submenu-item <?php echo ($currentPage === 'organisasi') ? 'active' : ''; ?>">
                    <a href="index.php?r=organisasi">Organisasi Laboratorium</a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item <?php echo ($currentPage === 'buat_surat_bebas' || $currentPage === 'surat_bebas' || $currentPage === 'lihat_surat_bebas') ? 'active' : ''; ?> has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Surat Bebas Laboratorium</span>
                </a>
                <ul class="submenu <?php echo ($currentPage === 'buat_surat_bebas' || $currentPage === 'surat_bebas' || $currentPage === 'lihat_surat_bebas') ? 'active' : ''; ?>">
                  <li class="submenu-item <?php echo ($currentPage === 'buat_surat_bebas') ? 'active' : ''; ?>">
                    <a href="index.php?r=buat_surat_bebas">Buat Surat</a>
                  </li>
                  <li class="submenu-item <?php echo ($currentPage === 'surat_bebas'|| $currentPage === 'lihat_surat_bebas') ? 'active' : ''; ?>">
                    <a href="index.php?r=lihat_surat_bebas">Lihat Surat</a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item <?php echo ($currentPage === 'buat_surat_penelitian' || $currentPage === 'lihat_surat_penelitian' || $currentPage === 'surat_penelitian') ? 'active' : ''; ?> has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Surat Penelitian</span>
                </a>
                <ul class="submenu <?php echo ($currentPage === 'buat_surat_penelitian' || $currentPage === 'lihat_surat_penelitian' || $currentPage === 'surat_penelitian') ? 'active' : ''; ?>">
                  <li class="submenu-item <?php echo ($currentPage === 'buat_surat_penelitian') ? 'active' : ''; ?>">
                    <a href="index.php?r=buat_surat_penelitian">Buat Surat</a>
                  </li>
                  <li class="submenu-item <?php echo ($currentPage === 'lihat_surat_penelitian' || $currentPage === 'surat_penelitian') ? 'active' : ''; ?>">
                    <a href="index.php?r=lihat_surat_penelitian">Lihat Surat</a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item <?php echo ($currentPage === 'buat_surat_peminjaman' || $currentPage === 'lihat_surat_peminjaman' || $currentPage === 'surat_peminjaman') ? 'active' : ''; ?> has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                  <span>Surat Peminjaman</span>
                </a>
                <ul class="submenu <?php echo ($currentPage === 'buat_surat_peminjaman' || $currentPage === 'lihat_surat_peminjaman' || $currentPage === 'surat_peminjaman') ? 'active' : ''; ?>">
                  <li class="submenu-item <?php echo ($currentPage === 'buat_surat_peminjaman') ? 'active' : ''; ?>">
                    <a href="index.php?r=buat_surat_peminjaman">Buat Surat</a>
                  </li>
                  <li class="submenu-item <?php echo ($currentPage === 'lihat_surat_peminjaman' || $currentPage === 'surat_peminjaman') ? 'active' : ''; ?>">
                    <a href="index.php?r=lihat_surat_peminjaman">Lihat Surat</a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-item <?php echo ($currentPage === 'inventaris' || $currentPage === 'inventarisLab') ? 'active' : ''; ?> has-sub">
                <a href="#" class="sidebar-link">
                  <i class="bi bi-grid-fill"></i>
                  <span>Inventarisasi</span>
                </a>
                <ul class="submenu <?php echo ($currentPage === 'inventaris' || $currentPage === 'inventarisLab') ? 'active' : ''; ?>">
                  <li class="submenu-item <?php echo ($currentPage === 'inventaris') ? 'active' : ''; ?>">
                    <a href="index.php?r=inventaris">Manajemen Barang</a>
                  </li>
                  <li class="submenu-item <?php echo ($currentPage === 'inventarisLab') ? 'active' : ''; ?>">
                    <a href="index.php?r=inventarisLab">Inventaris Laboratorium</a>
                  </li>
                </ul>
              </li>
              <li class="sidebar-title">Raise Support</li>

              <li class="sidebar-item">
                <a
                  href="https://github.com/muh-ilhamkurniawan/SIMALAB"
                  class="sidebar-link" target='_blank'
                >
                  <i class="bi bi-life-preserver"></i>
                  <span>Documentation</span>
                </a>
              </li>
            </ul>
          </div>