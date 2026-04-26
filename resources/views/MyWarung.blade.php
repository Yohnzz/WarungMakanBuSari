<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Warung Bu Sari — Admin Panel</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --hijau:#1a6b3a;--hijau-muda:#e8f5ee;--hijau-mid:#2d8a52;--hijau-dark:#124d29;
  --kuning:#f5a623;--kuning-muda:#fff8ee;
  --merah:#c0392b;--merah-muda:#fdecea;
  --biru-muda:#e8f0fe;--biru:#1a56db;
  --abu:#6b7280;--abu-muda:#f4f4f2;--putih:#fff;
  --teks:#1c1c1c;--border:#e2e8e4;
}
body{font-family:'Plus Jakarta Sans',sans-serif;background:#f0f4f1;color:var(--teks);min-height:100vh}
h1,h2,h3{font-family:'Playfair Display',serif}

/* LAYOUT */
.app{display:flex;min-height:100vh}
.sidebar{width:230px;background:var(--hijau);display:flex;flex-direction:column;flex-shrink:0;position:sticky;top:0;height:100vh}
.sidebar-logo{padding:24px 20px 18px;border-bottom:1px solid rgba(255,255,255,0.12)}
.sidebar-logo h1{color:#fff;font-size:21px;line-height:1.2}
.sidebar-logo p{color:rgba(255,255,255,0.55);font-size:11px;margin-top:4px;font-family:'Plus Jakarta Sans',sans-serif}
.sidebar-nav{padding:16px 12px;flex:1}
.nav-label{font-size:10px;color:rgba(255,255,255,0.38);font-weight:600;letter-spacing:.08em;text-transform:uppercase;padding:0 8px;margin:18px 0 6px}
.nav-item{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:8px;cursor:pointer;font-size:13.5px;font-weight:500;color:rgba(255,255,255,0.72);transition:all .15s;margin-bottom:2px;user-select:none}
.nav-item:hover{background:rgba(255,255,255,0.1);color:#fff}
.nav-item.active{background:rgba(255,255,255,0.18);color:#fff}
.nav-item svg{flex-shrink:0;opacity:.85}
.sidebar-footer{padding:16px 20px;border-top:1px solid rgba(255,255,255,0.1);font-size:11px;color:rgba(255,255,255,0.35)}

.main{flex:1;display:flex;flex-direction:column;min-height:100vh;overflow:hidden}
.topbar{background:#fff;border-bottom:1px solid var(--border);padding:14px 28px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:10}
.topbar-left h2{font-size:16px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600}
.topbar-left p{font-size:12px;color:var(--abu);margin-top:2px}

/* BUTTONS */
.btn{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;border:none;font-family:'Plus Jakarta Sans',sans-serif;transition:all .15s;line-height:1}
.btn-primary{background:var(--hijau);color:#fff}
.btn-primary:hover{background:var(--hijau-mid)}
.btn-danger{background:var(--merah-muda);color:var(--merah)}
.btn-danger:hover{background:#fbd5d2}
.btn-secondary{background:var(--abu-muda);color:var(--teks);border:1px solid var(--border)}
.btn-secondary:hover{background:#ebebeb}
.btn-warning{background:var(--kuning-muda);color:#a06b00}
.btn-warning:hover{background:#fdeec8}
.btn-sm{padding:5px 10px;font-size:12px;border-radius:6px}

.content{flex:1;overflow-y:auto;padding:24px 28px}

/* STATS */
.stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:24px}
.stat-card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:16px 20px}
.stat-label{font-size:12px;color:var(--abu);font-weight:500;margin-bottom:6px}
.stat-val{font-size:28px;font-weight:700;font-family:'Playfair Display',serif;color:var(--hijau)}
.stat-sub{font-size:11px;color:var(--abu);margin-top:4px}

/* CARD & TABLE */
.card{background:#fff;border:1px solid var(--border);border-radius:14px;overflow:hidden}
.card-header{padding:14px 20px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border);gap:12px;flex-wrap:wrap}
.card-header h3{font-size:15px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600}
.search-box{display:flex;align-items:center;gap:8px;background:#f9f9f8;border:1px solid var(--border);border-radius:8px;padding:7px 12px;min-width:220px}
.search-box svg{flex-shrink:0;color:var(--abu)}
.search-box input{border:none;background:transparent;font-size:13px;font-family:'Plus Jakarta Sans',sans-serif;outline:none;width:100%;color:var(--teks)}
.search-box input::placeholder{color:#aaa}

table{width:100%;border-collapse:collapse}
th{font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;color:var(--abu);padding:10px 16px;text-align:left;background:#fafaf8;border-bottom:1px solid var(--border)}
td{padding:11px 16px;font-size:13.5px;border-bottom:1px solid #f0f0ee;vertical-align:middle}
tr:last-child td{border-bottom:none}
tr:hover td{background:#fafff9}

.badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600}
.badge-minuman{background:#dbeafe;color:#1e40af}
.badge-makanan{background:#d1fae5;color:#065f46}
.badge-snack{background:#fef3c7;color:#92400e}
.badge-default{background:#f0f0ef;color:#555}

.thumb-wrap{width:46px;height:46px;border-radius:8px;overflow:hidden;background:#f4f4f2;border:1px solid var(--border);flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:20px}
.thumb-wrap img{width:100%;height:100%;object-fit:cover}

/* PAGES */
.page{display:none}.page.active{display:block}

/* EMPTY & LOADING */
.empty-state{text-align:center;padding:52px 20px;color:var(--abu)}
.empty-state .ei{font-size:48px;margin-bottom:14px}
.empty-state p{font-size:14px}
.loading-msg{text-align:center;padding:32px;color:var(--abu);font-size:13.5px}

/* ── MODAL ── */
.overlay{position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:200;display:none;align-items:center;justify-content:center;padding:16px}
.overlay.show{display:flex}
.modal{background:#fff;border-radius:16px;width:520px;max-width:100%;max-height:90vh;display:flex;flex-direction:column;animation:popIn .2s ease}
@keyframes popIn{from{transform:scale(.95) translateY(8px);opacity:0}to{transform:scale(1) translateY(0);opacity:1}}
.modal-header{padding:20px 24px 16px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-shrink:0}
.modal-header h3{font-size:17px;font-family:'Plus Jakarta Sans',sans-serif;font-weight:600}
.modal-close{background:none;border:none;font-size:22px;cursor:pointer;color:var(--abu);line-height:1;padding:0 4px}
.modal-close:hover{color:var(--teks)}
.modal-body{padding:20px 24px;overflow-y:auto;flex:1}
.modal-footer{padding:14px 24px;border-top:1px solid var(--border);display:flex;justify-content:flex-end;gap:8px;flex-shrink:0}

.form-group{margin-bottom:16px}
.form-label{font-size:13px;font-weight:600;margin-bottom:6px;display:block;color:var(--teks)}
.form-label span{color:#aaa;font-weight:400;margin-left:4px}
.form-control{width:100%;border:1px solid var(--border);border-radius:8px;padding:9px 12px;font-size:13.5px;font-family:'Plus Jakarta Sans',sans-serif;outline:none;transition:border-color .15s;background:#fff;color:var(--teks)}
.form-control:focus{border-color:var(--hijau-mid)}
select.form-control{cursor:pointer}
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}

/* UPLOAD GAMBAR */
.upload-area{border:2px dashed var(--border);border-radius:10px;padding:24px;text-align:center;cursor:pointer;transition:all .2s;background:#fafaf8;position:relative}
.upload-area:hover,.upload-area.dragover{border-color:var(--hijau-mid);background:var(--hijau-muda)}
.upload-area input[type=file]{position:absolute;inset:0;opacity:0;cursor:pointer;width:100%;height:100%}
.upload-icon{font-size:32px;margin-bottom:8px}
.upload-text{font-size:13px;color:var(--abu);line-height:1.5}
.upload-text strong{color:var(--hijau);font-weight:600}
.preview-wrap{position:relative;display:inline-block}
.preview-img{width:100%;max-height:160px;object-fit:contain;border-radius:8px;border:1px solid var(--border);display:block}
.preview-remove{position:absolute;top:-8px;right:-8px;background:var(--merah);color:#fff;border:none;border-radius:50%;width:22px;height:22px;cursor:pointer;font-size:14px;line-height:1;display:flex;align-items:center;justify-content:center}

/* KONFIRMASI DELETE */
.del-confirm{text-align:center;padding:12px 0 4px}
.del-confirm .del-icon{font-size:44px;margin-bottom:14px}
.del-confirm p{font-size:14px;color:var(--abu);line-height:1.65}
.del-confirm strong{color:var(--teks)}

/* TOAST */
.toast{position:fixed;bottom:24px;right:24px;padding:12px 20px;border-radius:10px;font-size:13.5px;font-weight:500;z-index:999;transform:translateY(16px);opacity:0;transition:all .3s;pointer-events:none;display:flex;align-items:center;gap:8px;box-shadow:0 4px 16px rgba(0,0,0,.15)}
.toast.show{transform:translateY(0);opacity:1}
.toast.success{background:var(--hijau);color:#fff}
.toast.error{background:var(--merah);color:#fff}
.toast.info{background:#1e40af;color:#fff}

/* SPINNER */
.spinner{width:16px;height:16px;border:2px solid rgba(255,255,255,.4);border-top-color:#fff;border-radius:50%;animation:spin .6s linear infinite;display:inline-block}
@keyframes spin{to{transform:rotate(360deg)}}
</style>
</head>
<body>

<div class="app">

  <!-- ── SIDEBAR ── -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <h1>Warung<br>Bu Sari</h1>
      <p>Panel Admin · Kelola Menu</p>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-label">Kelola Data</div>
      <div class="nav-item active" id="nav-menu" onclick="switchPage('menu')">
        <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Data Menu
      </div>
      <div class="nav-item" id="nav-kategori" onclick="switchPage('kategori')">
        <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg>
        Kategori
      </div>
    </nav>
    <div class="sidebar-footer">v1.0.0 · Warung Bu Sari</div>
  </aside>

  <!-- ── MAIN ── -->
  <div class="main">
    <header class="topbar">
      <div class="topbar-left">
        <h2 id="topbar-title">Data Menu</h2>
        <p id="topbar-sub">Kelola semua menu warung Bu Sari</p>
      </div>
      <button class="btn btn-primary" id="btn-tambah" onclick="handleTambah()">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
        Tambah Menu
      </button>
    </header>

    <div class="content">

      <!-- PAGE MENU -->
      <div class="page active" id="page-menu">
        <div class="stats-grid">
          <div class="stat-card">
            <div class="stat-label">Total Menu</div>
            <div class="stat-val" id="s-total">—</div>
            <div class="stat-sub">item terdaftar</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Harga Terendah</div>
            <div class="stat-val" id="s-min">—</div>
            <div class="stat-sub">menu termurah</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Harga Tertinggi</div>
            <div class="stat-val" id="s-max">—</div>
            <div class="stat-sub">menu termahal</div>
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h3>Daftar Menu</h3>
            <div style="display:flex;gap:10px;align-items:center">
              <div class="search-box">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
                <input type="text" id="search-menu" placeholder="Cari nama menu..." oninput="debounceSearchMenu(this.value)">
              </div>
            </div>
          </div>
          <table>
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Ditambah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="tbody-menu">
              <tr><td colspan="6" class="loading-msg">Memuat data menu...</td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- PAGE KATEGORI -->
      <div class="page" id="page-kategori">
        <div class="card">
          <div class="card-header">
            <h3>Daftar Kategori</h3>
            <div class="search-box">
              <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
              <input type="text" id="search-kat" placeholder="Cari kategori..." oninput="debounceSearchKat(this.value)">
            </div>
          </div>
          <table>
            <thead>
              <tr>
                <th style="width:60px">ID</th>
                <th>Nama Kategori</th>
                <th>Dibuat</th>
                <th style="width:160px">Aksi</th>
              </tr>
            </thead>
            <tbody id="tbody-kat">
              <tr><td colspan="4" class="loading-msg">Memuat data kategori...</td></tr>
            </tbody>
          </table>
        </div>
      </div>

    </div><!-- end content -->
  </div><!-- end main -->
</div><!-- end app -->

<!-- ════════════════════════════════
     MODAL TAMBAH / EDIT MENU
════════════════════════════════ -->
<div class="overlay" id="modal-menu">
  <div class="modal">
    <div class="modal-header">
      <h3 id="modal-menu-title">Tambah Menu</h3>
      <button class="modal-close" onclick="closeModal('modal-menu')">×</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="menu-id">

      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nama Menu</label>
          <input type="text" class="form-control" id="menu-nama" placeholder="cth: Nasi Goreng Spesial">
        </div>
        <div class="form-group">
          <label class="form-label">Harga <span>(Rp)</span></label>
          <input type="number" class="form-control" id="menu-harga" placeholder="cth: 15000" min="0">
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Kategori</label>
        <select class="form-control" id="menu-kategori">
          <option value="">— Pilih Kategori —</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Foto Menu <span>(opsional)</span></label>
        <div class="upload-area" id="upload-area" ondragover="onDragOver(event)" ondragleave="onDragLeave(event)" ondrop="onDrop(event)">
          <input type="file" id="menu-gambar-file" accept="image/*" onchange="onFileChange(event)">
          <div id="upload-placeholder">
            <div class="upload-icon">🖼️</div>
            <div class="upload-text">
              <strong>Klik untuk upload</strong> atau drag & drop<br>
              PNG, JPG, JPEG · Maks. 2 MB
            </div>
          </div>
          <div id="upload-preview" style="display:none">
            <div class="preview-wrap">
              <img id="preview-img" class="preview-img" src="" alt="preview">
              <button class="preview-remove" onclick="removePreview(event)" title="Hapus foto">×</button>
            </div>
          </div>
        </div>
        <!-- URL gambar existing saat edit -->
        <input type="hidden" id="menu-gambar-existing">
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="closeModal('modal-menu')">Batal</button>
      <button class="btn btn-primary" id="btn-simpan-menu" onclick="simpanMenu()">
        Simpan Menu
      </button>
    </div>
  </div>
</div>

<!-- ════════════════════════════════
     MODAL TAMBAH / EDIT KATEGORI
════════════════════════════════ -->
<div class="overlay" id="modal-kat">
  <div class="modal" style="width:400px">
    <div class="modal-header">
      <h3 id="modal-kat-title">Tambah Kategori</h3>
      <button class="modal-close" onclick="closeModal('modal-kat')">×</button>
    </div>
    <div class="modal-body">
      <input type="hidden" id="kat-id">
      <div class="form-group">
        <label class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" id="kat-nama" placeholder="cth: Makanan, Minuman, Snack">
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="closeModal('modal-kat')">Batal</button>
      <button class="btn btn-primary" id="btn-simpan-kat" onclick="simpanKategori()">Simpan Kategori</button>
    </div>
  </div>
</div>

<!-- ════════════════════════════════
     MODAL KONFIRMASI HAPUS
════════════════════════════════ -->
<div class="overlay" id="modal-hapus">
  <div class="modal" style="width:380px">
    <div class="modal-body">
      <div class="del-confirm">
        <div class="del-icon">🗑️</div>
        <h3 style="font-family:'Plus Jakarta Sans',sans-serif;margin-bottom:10px">Hapus Item?</h3>
        <p>Yakin ingin menghapus <strong id="hapus-name">"item ini"</strong>?<br>Data yang dihapus tidak bisa dikembalikan.</p>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="closeModal('modal-hapus')">Batal</button>
      <button class="btn btn-danger" id="btn-konfirm-hapus" onclick="eksekusiHapus()">Ya, Hapus</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<script>
/* ═══════════════════════════════════════════
   CONFIG
═══════════════════════════════════════════ */
const BASE = 'http://127.0.0.1:8000/api';

/* state */
let currentPage = 'menu';
let allMenus    = [];
let allKategori = [];
let deleteTarget = null;
let searchMenuTimer = null;
let searchKatTimer  = null;
let selectedFile    = null; // File object untuk upload

/* ═══════════════════════════════════════════
   UTILS
═══════════════════════════════════════════ */
const rupiah = n => 'Rp ' + Number(n).toLocaleString('id-ID');
const tgl    = s => new Date(s).toLocaleDateString('id-ID', {day:'2-digit',month:'short',year:'numeric'});

function toast(msg, type='success') {
  const el = document.getElementById('toast');
  el.textContent = msg;
  el.className   = `toast ${type} show`;
  setTimeout(() => el.classList.remove('show'), 3200);
}

function openModal(id)  { document.getElementById(id).classList.add('show') }
function closeModal(id) { document.getElementById(id).classList.remove('show') }

function setBtnLoading(id, loading) {
  const btn = document.getElementById(id);
  if (loading) {
    btn.dataset.orig = btn.innerHTML;
    btn.innerHTML = '<span class="spinner"></span> Menyimpan...';
    btn.disabled = true;
  } else {
    btn.innerHTML = btn.dataset.orig || btn.innerHTML;
    btn.disabled = false;
  }
}

function badgeCls(nama) {
  if (!nama) return 'badge-default';
  const n = nama.toLowerCase();
  if (n.includes('minum')) return 'badge-minuman';
  if (n.includes('makan')) return 'badge-makanan';
  if (n.includes('snack') || n.includes('cemilan') || n.includes('gorengan')) return 'badge-snack';
  return 'badge-default';
}

function imgUrl(path) {
  if (!path) return '';
  if (path.startsWith('http')) return path;
  return BASE.replace('/api','') + '/' + path;
}

/* ═══════════════════════════════════════════
   PAGE SWITCH
═══════════════════════════════════════════ */
function switchPage(page) {
  currentPage = page;
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('page-' + page).classList.add('active');
  document.getElementById('nav-' + page).classList.add('active');

  if (page === 'menu') {
    document.getElementById('topbar-title').textContent = 'Data Menu';
    document.getElementById('topbar-sub').textContent   = 'Kelola semua menu warung Bu Sari';
    document.getElementById('btn-tambah').innerHTML     =
      '<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg> Tambah Menu';
    loadMenu();
  } else {
    document.getElementById('topbar-title').textContent = 'Kategori';
    document.getElementById('topbar-sub').textContent   = 'Kelola kategori menu';
    document.getElementById('btn-tambah').innerHTML     =
      '<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg> Tambah Kategori';
    loadKategori();
  }
}

function handleTambah() {
  if (currentPage === 'menu') openTambahMenu();
  else openTambahKategori();
}

/* ═══════════════════════════════════════════
   UPLOAD GAMBAR
═══════════════════════════════════════════ */
function onFileChange(e) {
  const file = e.target.files[0];
  if (file) setPreview(file);
}

function onDragOver(e) {
  e.preventDefault();
  document.getElementById('upload-area').classList.add('dragover');
}

function onDragLeave() {
  document.getElementById('upload-area').classList.remove('dragover');
}

function onDrop(e) {
  e.preventDefault();
  document.getElementById('upload-area').classList.remove('dragover');
  const file = e.dataTransfer.files[0];
  if (file && file.type.startsWith('image/')) setPreview(file);
}

function setPreview(file) {
  if (file.size > 2 * 1024 * 1024) { toast('Ukuran gambar maks 2 MB!', 'error'); return; }
  selectedFile = file;
  const reader = new FileReader();
  reader.onload = ev => {
    document.getElementById('preview-img').src = ev.target.result;
    document.getElementById('upload-placeholder').style.display = 'none';
    document.getElementById('upload-preview').style.display     = 'block';
  };
  reader.readAsDataURL(file);
}

function removePreview(e) {
  e.preventDefault();
  e.stopPropagation();
  selectedFile = null;
  document.getElementById('menu-gambar-file').value = '';
  document.getElementById('preview-img').src = '';
  document.getElementById('upload-placeholder').style.display = 'block';
  document.getElementById('upload-preview').style.display     = 'none';
  document.getElementById('menu-gambar-existing').value       = '';
}

function resetUpload() {
  selectedFile = null;
  document.getElementById('menu-gambar-file').value = '';
  document.getElementById('preview-img').src = '';
  document.getElementById('upload-placeholder').style.display = 'block';
  document.getElementById('upload-preview').style.display     = 'none';
  document.getElementById('menu-gambar-existing').value       = '';
}

/* ═══════════════════════════════════════════
   MENU — LOAD
═══════════════════════════════════════════ */
async function loadMenu(search = '') {
  const url = search ? `${BASE}/menu?search=${encodeURIComponent(search)}` : `${BASE}/menu`;
  try {
    const res  = await fetch(url, { headers: { 'Accept': 'application/json' } });
    const json = await res.json();
    allMenus   = json.data || json || [];
    if (!Array.isArray(allMenus)) allMenus = [];
    renderMenu(allMenus);
    updateStats(allMenus);
  } catch (err) {
    // Demo fallback — API belum jalan
    allMenus = getDemoMenu();
    renderMenu(allMenus);
    updateStats(allMenus);
  }
  // Juga load kategori untuk select option
  if (allKategori.length === 0) await loadKategoriSilent();
}

function updateStats(data) {
  document.getElementById('s-total').textContent = data.length;
  if (data.length) {
    const h = data.map(m => m.harga);
    document.getElementById('s-min').textContent = rupiah(Math.min(...h));
    document.getElementById('s-max').textContent = rupiah(Math.max(...h));
  } else {
    document.getElementById('s-min').textContent = '—';
    document.getElementById('s-max').textContent = '—';
  }
}

function renderMenu(data) {
  const tb = document.getElementById('tbody-menu');
  if (!data.length) {
    tb.innerHTML = `<tr><td colspan="6"><div class="empty-state"><div class="ei">🍽️</div><p>Belum ada menu atau tidak ditemukan.</p></div></td></tr>`;
    return;
  }
  tb.innerHTML = data.map(m => {
    const nama = m.nama;
    const kat  = m.kategori?.nama_kategori || '-';
    const src  = imgUrl(m.gambar);
    const imgHtml = src
      ? `<img src="${src}" onerror="this.parentElement.innerHTML='🍜'" alt="${nama}">`
      : '🍜';
    return `<tr>
      <td><div class="thumb-wrap">${imgHtml}</div></td>
      <td><strong>${nama}</strong></td>
      <td><span class="badge ${badgeCls(kat)}">${kat}</span></td>
      <td><strong>${rupiah(m.harga)}</strong></td>
      <td style="color:var(--abu);font-size:12px">${tgl(m.created_at)}</td>
      <td>
        <div style="display:flex;gap:6px">
          <button class="btn btn-warning btn-sm" onclick="openEditMenu(${m.id})">✏️ Edit</button>
          <button class="btn btn-danger btn-sm" onclick="konfirmasiHapus('menu',${m.id},'${nama.replace(/'/g,"\\'")}')">🗑️ Hapus</button>
        </div>
      </td>
    </tr>`;
  }).join('');
}

/* SEARCH MENU dengan debounce → kirim ke API */
function debounceSearchMenu(val) {
  clearTimeout(searchMenuTimer);
  searchMenuTimer = setTimeout(() => loadMenu(val.trim()), 400);
}

/* ═══════════════════════════════════════════
   MENU — MODAL TAMBAH
═══════════════════════════════════════════ */
async function openTambahMenu() {
  document.getElementById('modal-menu-title').textContent = 'Tambah Menu Baru';
  document.getElementById('menu-id').value    = '';
  document.getElementById('menu-nama').value  = '';
  document.getElementById('menu-harga').value = '';
  resetUpload();
  await populateKategoriSelect('');
  openModal('modal-menu');
}

/* ═══════════════════════════════════════════
   MENU — MODAL EDIT
═══════════════════════════════════════════ */
async function openEditMenu(id) {
  const m = allMenus.find(x => x.id === id);
  if (!m) return;
  document.getElementById('modal-menu-title').textContent = 'Edit Menu';
  document.getElementById('menu-id').value    = m.id;
  document.getElementById('menu-nama').value  = m.nama || m.nama_menu || '';
  document.getElementById('menu-harga').value = m.harga;
  resetUpload();

  // Kalau ada gambar existing, tampilkan preview
  if (m.gambar) {
    const src = imgUrl(m.gambar);
    document.getElementById('menu-gambar-existing').value = m.gambar;
    document.getElementById('preview-img').src = src;
    document.getElementById('upload-placeholder').style.display = 'none';
    document.getElementById('upload-preview').style.display     = 'block';
  }

  await populateKategoriSelect(m.kategori ? (m.kategori.id_kategori || m.kategori.id_kategori || '') : '');
  openModal('modal-menu');
}

async function populateKategoriSelect(selectedId) {
  if (allKategori.length === 0) await loadKategoriSilent();
  const sel = document.getElementById('menu-kategori');
  sel.innerHTML = '<option value="">— Pilih Kategori —</option>' +
    allKategori.map(k => `<option value="${k.id_kategori}" ${String(k.id_kategori) === String(selectedId) ? 'selected' : ''}>${k.nama_kategori || k.nama}</option>`).join('');
}

/* ═══════════════════════════════════════════
   MENU — SIMPAN (POST / PUT)
═══════════════════════════════════════════ */
async function simpanMenu() {
  const id     = document.getElementById('menu-id').value;
  const nama   = document.getElementById('menu-nama').value.trim();
  const harga  = document.getElementById('menu-harga').value;
  const katId  = document.getElementById('menu-kategori').value;

  if (!nama)  { toast('Nama menu wajib diisi!', 'error'); return; }
  if (!harga) { toast('Harga menu wajib diisi!', 'error'); return; }

  setBtnLoading('btn-simpan-menu', true);

  try {
    const url = id ? `${BASE}/menu/${id}` : `${BASE}/menu`;

    let response;

    if (selectedFile) {
      const fd = new FormData();
      fd.append('nama', nama); // ✅ FIX
      fd.append('harga', harga);
      fd.append('kategori', katId); // ✅ FIX
      fd.append('gambar', selectedFile);

      if (id) fd.append('_method', 'PUT');

      response = await fetch(url, {
        method: 'POST',
        headers: { 'Accept': 'application/json' },
        body: fd
      });

    } else {
      const body = {
        nama: nama, // ✅ FIX
        harga: parseInt(harga),
        kategori: katId // ✅ FIX
      };

      response = await fetch(url, {
        method: id ? 'PUT' : 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify(body)
      });
    }

    const resJson = await response.json();

    if (!response.ok) {
      throw new Error(resJson.message || 'Gagal');
    }

    toast(resJson.message || 'Berhasil ✅');
    closeModal('modal-menu');
    loadMenu();

  } catch (err) {
    console.log(err);
    toast(err.message, 'error');
  } finally {
    setBtnLoading('btn-simpan-menu', false);
  }
}

/* ═══════════════════════════════════════════
   KATEGORI — LOAD
═══════════════════════════════════════════ */
async function loadKategoriSilent() {
  try {
    const res  = await fetch(`${BASE}/kategori`, { headers: { 'Accept': 'application/json' } });
    const json = await res.json();
    allKategori = json.data || json || [];
    if (!Array.isArray(allKategori)) allKategori = [];
  } catch {
    allKategori = [
      { id: 1, nama_kategori: 'Makanan', created_at: '2026-04-20T08:00:00Z' },
      { id: 2, nama_kategori: 'Minuman', created_at: '2026-04-20T08:00:00Z' },
      { id: 3, nama_kategori: 'Snack',   created_at: '2026-04-20T08:00:00Z' },
    ];
  }
}

async function loadKategori(search = '') {
  const url = search
    ? `${BASE}/kategori?search=${encodeURIComponent(search)}`
    : `${BASE}/kategori`;
  try {
    const res   = await fetch(url, { headers: { 'Accept': 'application/json' } });
    const json  = await res.json();
    allKategori = json.data || json || [];
    if (!Array.isArray(allKategori)) allKategori = [];
    renderKategori(allKategori);
  } catch {
    if (allKategori.length === 0) await loadKategoriSilent();
    const filtered = search
      ? allKategori.filter(k => (k.nama_kategori || k.nama || '').toLowerCase().includes(search.toLowerCase()))
      : allKategori;
    renderKategori(filtered);
  }
}

function debounceSearchKat(val) {
  clearTimeout(searchKatTimer);
  searchKatTimer = setTimeout(() => loadKategori(val.trim()), 400);
}

function renderKategori(data) {
  const tb = document.getElementById('tbody-kat');
  if (!data.length) {
    tb.innerHTML = `<tr><td colspan="4"><div class="empty-state"><div class="ei">🏷️</div><p>Belum ada kategori atau tidak ditemukan.</p></div></td></tr>`;
    return;
  }
  tb.innerHTML = data.map(k => {
    const nama = k.nama_kategori || k.nama || '—';
    return `<tr>
      <td style="color:var(--abu);font-size:12px">#${k.id_kategori}</td>
      <td><strong>${nama}</strong></td>
      <td style="color:var(--abu);font-size:12px">${tgl(k.created_at)}</td>
      <td>
        <div style="display:flex;gap:6px">
          <button class="btn btn-warning btn-sm" onclick="openEditKategori(${k.id_kategori})">✏️ Edit</button>
          <button class="btn btn-danger btn-sm" onclick="konfirmasiHapus('kategori',${k.id_kategori},'${nama.replace(/'/g,"\\'")}')">🗑️ Hapus</button>
        </div>
      </td>
    </tr>`;
  }).join('');
}

/* ═══════════════════════════════════════════
   KATEGORI — MODAL
═══════════════════════════════════════════ */
function openTambahKategori() {
  document.getElementById('modal-kat-title').textContent = 'Tambah Kategori';
  document.getElementById('kat-id').value   = '';
  document.getElementById('kat-nama').value = '';
  openModal('modal-kat');
}

function openEditKategori(id) {
  const k = allKategori.find(x => x.id_kategori === id);
  if (!k) return;
  document.getElementById('modal-kat-title').textContent = 'Edit Kategori';
  document.getElementById('kat-id').value   = k.id_kategori;
  document.getElementById('kat-nama').value = k.nama_kategori || k.nama || '';
  openModal('modal-kat');
}

async function simpanKategori() {
  const id   = document.getElementById('kat-id').value;
  const nama = document.getElementById('kat-nama').value.trim();
  if (!nama) { toast('Nama kategori wajib diisi!', 'error'); return; }

  setBtnLoading('btn-simpan-kat', true);

  try {
    const url    = id ? `${BASE}/kategori/${id}` : `${BASE}/kategori`;
    const method = id ? 'PUT' : 'POST';
    const res    = await fetch(url, {
      method,
      headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
      body: JSON.stringify({ nama_kategori: nama })
    });
    if (!res.ok) throw new Error('API error');
    toast(id ? 'Kategori berhasil diupdate! ✅' : 'Kategori berhasil ditambahkan! ✅');
    closeModal('modal-kat');
    loadKategori(document.getElementById('search-kat').value);
  } catch {
    // Demo mode
    if (id) {
      const idx = allKategori.findIndex(x => x.id === parseInt(id));
      if (idx > -1) allKategori[idx] = { ...allKategori[idx], nama_kategori: nama };
    } else {
      allKategori.push({ id: Date.now(), nama_kategori: nama, created_at: new Date().toISOString() });
    }
    renderKategori(allKategori);
    toast(`[Demo] ${id ? 'Kategori diupdate!' : 'Kategori ditambahkan!'} ✅`);
    closeModal('modal-kat');
  } finally {
    setBtnLoading('btn-simpan-kat', false);
  }
}

/* ═══════════════════════════════════════════
   DELETE
═══════════════════════════════════════════ */
function konfirmasiHapus(type, id, nama) {
  deleteTarget = { type, id, nama };
  document.getElementById('hapus-name').textContent = `"${nama}"`;
  openModal('modal-hapus');
}

async function eksekusiHapus() {
  if (!deleteTarget) return;
  const { type, id, nama } = deleteTarget;
  setBtnLoading('btn-konfirm-hapus', true);

  try {
   const res = await fetch(`${BASE}/${type}/${id}`, {
  method: 'DELETE',
  headers: { 'Accept': 'application/json' }
});
const json = await res.json();
if (!res.ok) throw new Error(json.message);
  } catch {
    // Demo
    if (type === 'menu')     allMenus    = allMenus.filter(x => x.id !== id);
    else                     allKategori = allKategori.filter(x => x.id !== id);
    toast(`[Demo] ${nama} dihapus! 🗑️`);
  } finally {
    setBtnLoading('btn-konfirm-hapus', false);
    deleteTarget = null;
    closeModal('modal-hapus');
    if (type === 'menu') { renderMenu(allMenus); updateStats(allMenus); }
    else renderKategori(allKategori);
  }
}

/* ═══════════════════════════════════════════
   CLOSE MODAL ON OVERLAY CLICK
═══════════════════════════════════════════ */
document.querySelectorAll('.overlay').forEach(ov => {
  ov.addEventListener('click', e => { if (e.target === ov) ov.classList.remove('show'); });
});

/* ═══════════════════════════════════════════
   INIT
═══════════════════════════════════════════ */
loadMenu();
loadKategoriSilent();
</script>
</body>
</html>