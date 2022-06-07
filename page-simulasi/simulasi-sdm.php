<h1 class="judul text-center" style="margin:40px 0 40px 0;">Simulasi Sistem Informasi SDM</h1>

<?php 

  include("function.php");
  $namaperusahaan = @$_POST["nama-perusahaan"];
  $jumlahdivisi = @$_POST["jumlah-divisi"];
  $divisi = @$_POST['divisi'];

?>

<div class="container">

  <h1 class="judul" style="margin:40px 0 10px 0;">1. Penggajian Karyawan</h1>
  <p class="isi-artikel">Manajemen penggajian karyawan merupakan panduan dasar tentang perencanaan, penyusunan, dan pengelolaan penggajian untuk para karyawan. Tiap jenis perusahaan menerapkan sistem penggajian dan pengupahan yang berbeda. Pada kesempatan ini jenis perusahaan yang akan dijadikan contoh penerapan manajemen penggajian dan pengupahan karyawan.</p>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Jumlah Jabatan
  </button>

</div><br>

<!-- FORM PENGGAJIAN -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#daftar-gaji" method="POST">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Isi data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <Input type="text" maxlength="40" class="form-control" placeholder="Nama Perusahaan" name="nama-perusahaan" style="margin-bottom:10px;" required></Input>
          <Input type="number" min="0" max="100000000" class="form-control" placeholder="Jumlah Jabatan" name="jumlah-divisi" required></Input>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
          <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>

      </div>
    </form>
  </div>
</div>

<!-- DATA PENGGAJIAN -->
<div class="container" id=daftar-gaji>
  <form action="" method="POST">
    <table class="table table-primary text-center">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Jabatan Karyawan</th>
          <th>Jumlah Karyawan</th>
          <th>Gaji Pokok Per-Jabatan</th>
        </tr>
      </thead>
      <tbody class="table-secondary">
        <tr>
          <td><?php echo 1; ?></td>
          <td><input class="form-control" type="text" maxlength="40" name="divisi[]" placeholder="IT Support..." required></td>
          <td><input class="form-control" type="number" min="0" max="100000000" name="karyawan[]" required></td>
          <td>
            <div class="input-group mb-3">
              <span class="input-group-text">Rp.</span>
              <input type="text" maxlength="40" class="form-control" aria-label="Rupiah" name="gaji[]" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
              <span class="input-group-text">.00</span>
            </div>
          </td>
        </tr>

        <?php if (isset($_POST['simpan'])) { 
          $no = 1;
        ?>
        <?php while ($no < $jumlahdivisi) { ?>
        <tr>
          <td><?php echo $no+1; ?></td>
          <td><input class="form-control" type="text" maxlength="40" name="divisi[]" required></td>
          <td><input class="form-control" type="text" min="0" max="100000000" name="karyawan[]" required></td>
          <td><div class="input-group mb-3">
                <span class="input-group-text">Rp.</span>
                <input type="text" maxlength="40" class="form-control" aria-label="Rupiah" name="gaji[]" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required>
                <span class="input-group-text">.00</span>
              </div></td>
          </tr>
        <?php $no++;} ?>
        <?php } ?>
      </tbody>

    </table>
    <button type="submit" class="btn btn-primary" name="proses">Simpan</button>
  </form>
</div>

<!-- OUTPUT DATA PENGGAJIAN -->
<div class="container" style="padding-top:30px;">
  <div id="source-html">
    <table class="table table-primary text-center" id="table_wrapper">

      <?php if (isset($_POST['proses'])) { 
        $gaji1 = $_POST['gaji'];
        $gaji = str_replace(".", "", $gaji1);
        $karyawan = $_POST['karyawan'];  
        $no = 0;
      ?>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama Jabatan Karyawan</th>
          <th>Jumlah Karyawan</th>
          <th>Gaji Pokok Per-Jabatan</th>
          <th>Total Gaji Pokok Jabatan</th>
        </tr>
      </thead>
      <tbody class="table-secondary">
        
        <?php foreach ($karyawan as $key) { ?>
          <tr>
            <td><?php echo $no+1; ?></td>
            <td><?php echo $divisi[$no]; ?></td>
            <td><?php echo $karyawan[$no]; ?></td>
            <td><?php echo rupiah($gaji[$no]) ?></td>
            <td><?php rupiah($total=$gaji[$no] * $karyawan[$no]); echo rupiah($total);?>
            </td>
          </tr>
        <?php $no++;} ?>

      </tbody>
      <?php } ?>
    </table>
    </div>
    <p align="right">
        <button id="btnExport" class="btn btn-success">Export to Excel</button>
        <button id="btn-export" onclick="exportHTML();" class="btn btn-primary">Export to Word</button>
    </p>  
</div>


<!--BAGAN ORGANISASI-->
<div class="container">
    
  <h1 class="judul">2. Bagan Organisasi</h1>
  <p class="isi-artikel">Struktur organisasi adalah sebuah garis hirarki atau bertingkat yang mendeskripsikan komponen-komponen yang menyusun perusahaan. Dimana setiap individu atau SDM yang berada pada lingkup perusahaan tersebut memiliki posisi dan fungsinya masing-masing.</p>


  <div id="tree" style="background-color:#CBE9F2;"></div>
    
    
</div>
  



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
            window.onload = function () {
                OrgChart.templates.ana.plus = '<circle cx="15" cy="15" r="15" fill="#ffffff" stroke="#aeaeae" stroke-width="1"></circle>'
                    + '<text text-anchor="middle" style="font-size: 18px;cursor:pointer;" fill="#757575" x="15" y="22">{collapsed-children-count}</text>';

                OrgChart.templates.invisibleGroup.padding = [20, 0, 0, 0];

            var chart = new OrgChart(document.getElementById("tree"), {
                template: "ana",
                enableDragDrop: true,
                assistantSeparation: 170,
              
                nodeMenu: {
                    details: { text: "Rincian" },
                    edit: { text: "Edit" },
                    add: { text: "Tambah" },
                    remove: { text: "Hapus" }
                },
                align: OrgChart.ORIENTATION,
                toolbar: {
                    fullScreen: true,
                    zoom: true,
                    fit: true,
                    expandAll: true
                },
                nodeBinding: {
                    field_0: "name",
                    field_1: "Jabatan"
                },
                tags: {
                    "top-management": {
                        template: "invisibleGroup",
                        subTreeConfig: {
                            orientation: OrgChart.orientation.bottom,
                            collapse: {
                                level: 1
                            }
                        }
                    },
                    "it-team": {
                        subTreeConfig: {
                            layout: OrgChart.mixed,
                            collapse: {
                                level: 1
                            }
                        },
                    },
                    "hr-team": {
                        subTreeConfig: {
                            layout: OrgChart.treeRightOffset,
                            collapse: {
                                level: 1
                            }
                        },
                    },
                    "sales-team": {
                        subTreeConfig: {
                            layout: OrgChart.treeLeftOffset,
                            collapse: {
                                level: 1
                            }
                        },
                    },
                    "seo-menu": {
                        nodeMenu: {
                            addSharholder: { text: "Tambah Pemilik Perusahaan Baru", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addSharholder },
                            addDepartment: { text: "Tambah Divisi Baru", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addDepartment },
                            addAssistant: { text: "Tambah Asisten Baru", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addAssistant },
                            edit: { text: "Edit" },
                            details: { text: "Rincian" },
                        }
                    },
                    "menu-without-add": {
                        nodeMenu: {
                            details: { text: "Rincian" },
                            edit: { text: "Edit" },
                            remove: { text: "Hapus" }
                        }
                    },
                    "department": {
                        template: "group",
                        nodeMenu: {
                            addManager: { text: "Tambah Karyawan", icon: OrgChart.icon.add(24, 24, "#7A7A7A"), onClick: addManager },
                            remove: { text: "Hapus Divisi" },
                            edit: { text: "Edit Divisi" },
                            
                        }
                    }
                }
            });

            chart.on("added", function (sender, id) {
                sender.editUI.show(id);
            });

            chart.on('drop', function (sender, draggedNodeId, droppedNodeId) {
                var draggedNode = sender.getNode(draggedNodeId);
                var droppedNode = sender.getNode(droppedNodeId);

                if (droppedNode.tags.indexOf("department") != -1 && draggedNode.tags.indexOf("department") == -1) {
                    var draggedNodeData = sender.get(draggedNode.id);
                    draggedNodeData.pid = null;
                    draggedNodeData.stpid = droppedNode.id;
                    sender.updateNode(draggedNodeData);
                    return false;
                }
            });

            chart.editUI.on('field', function (sender, args) {
                var isDeprtment = sender.node.tags.indexOf("department") != -1;
                var deprtmentFileds = ["name"];

                if (isDeprtment && deprtmentFileds.indexOf(args.name) == -1) {
                    return false;
                }
            });

            chart.on('exportstart', function (sender, args) {
                args.styles = document.getElementById('myStyles').outerHTML;
            });

            chart.load([
                { id: "top-management", tags: ["top-management"] },
                { id: "hr-team", pid: "top-management", tags: ["hr-team", "department"], name: "Divisi Keuangan" },
                { id: "it-team", pid: "top-management", tags: ["it-team", "department"], name: "Divisi SDM" },
                { id: "sales-team", pid: "top-management", tags: ["sales-team", "department"], name: "Divisi Manufaktur" },

                { id: 1, stpid: "top-management", name: "Dimas W", Jabatan: "Direktur Utama",  tags: ["seo-menu"] },
                

                { id: 4, stpid: "hr-team", name: "Harris M", Jabatan: "Manajer Keuangan",  },

                { id: 7, stpid: "it-team", name: "Robbin C", Jabatan: "Manajer SDM",  },
                

                { id: 11, stpid: "it-team", name: "Lynn F", Jabatan: "Sekretaris SDM",  },
                
                { id: 15, stpid: "sales-team", name: "Tyler A", Jabatan: "Manajer SDM",  },

                { id: 18, pid: "top-management", name: "Milea H", Jabatan: "Direktur Keuangan",  tags: ["assistant", "menu-without-add"] }
            ]);

            function preview() {
                OrgChart.pdfPrevUI.show(chart, {
                    format: 'A4'
                });
            }

            function nodePdfPreview(nodeId) {
                OrgChart.pdfPrevUI.show(chart, {
                    format: 'A4',
                    nodeId: nodeId
                });
            }

            function addSharholder(nodeId) {
                chart.addNode({ id: OrgChart.randomId(), pid: nodeId, tags: ["menu-without-add"] });
            }

            function addAssistant(nodeId) {
                var node = chart.getNode(nodeId);
                var data = { id: OrgChart.randomId(), pid: node.stParent.id, tags: ["assistant"] };
                chart.addNode(data);
            }


            function addDepartment(nodeId) {
                var node = chart.getNode(nodeId);
                var data = { id: OrgChart.randomId(), pid: node.stParent.id, tags: ["department"] };
                chart.addNode(data);
            }

            function addManager(nodeId) {
                chart.addNode({ id: OrgChart.randomId(), stpid: nodeId });
            }
            };

        </script>