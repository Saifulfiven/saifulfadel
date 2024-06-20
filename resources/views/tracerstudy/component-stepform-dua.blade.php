  <!-- step 2 -->
                    <div class="step">
                        <div class="row">
                            <div class="col-md-4">
                                <div id="title-container">
                                    <img class="covid-image" src="/img/logo-header.png">
                                    <h2>Form Data Alumni</h2>
                                    <h3>Nobel Indonesia</h3>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>1. Jelaskan status Anda saat ini ? <span class="text-wajib">(wajib diisi)</span> </label> <br>
                                    <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <input class="form-check-input question__input" id="satu_1" name="satu" type="radio" value="1"> 
                                            <label class="form-check-label question__label" for="satu_1">Bekerja (full time / part time)</label>
                                        </div>
                                        <div class="q-box__question">
                                            <input class="form-check-input question__input" id="satu_2" name="satu" type="radio" value="2"> 
                                            <label class="form-check-label question__label" for="satu_2">Belum memungkinkan bekerja</label>
                                        </div>
                                        <div class="q-box__question">
                                            <input class="form-check-input question__input" id="satu_3" name="satu" type="radio" value="3"> 
                                            <label class="form-check-label question__label" for="satu_3">Wiraswasta</label>
                                        </div>
                                        <div class="q-box__question">
                                            <input class="form-check-input question__input" id="satu_4" name="satu" type="radio" value="4"> 
                                            <label class="form-check-label question__label" for="satu_4">Melanjutkan Pendidikan</label>
                                        </div>
                                        
                                        <div class="q-box__question">
                                            <input checked class="form-check-input question__input" id="satu_5" name="satu" type="radio" value="5"> 
                                            <label class="form-check-label question__label" for="satu_5">Tidak kerja tetapi sedang mencari kerja</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>2. Apakah Anda telah mendapatkan pekerjaan &lt;= 6 bulan /
                                        termasuk bekerja sebelum lulus?</label>
                                        <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <input  onchange="toggleOtherduadisabled(this,'duaBa','duaBb')" class="form-check-input question__input" id="dua_1" name="duaA" type="radio" value="Ya"> 
                                            <label class="form-check-label question__label" for="dua_1">Ya</label>
                                        </div>
                                        <div class="q-box__question">
                                            <input  onchange="toggleOtherdua(this,'duaBa','duaBb')" class="form-check-input question__input" id="dua_2" name="duaA" type="radio" value="Tidak"> 
                                            <label class="form-check-label question__label" for="dua_2">Tidak</label>
                                        </div>
                                        </div>

                                    <div class="custom-radio row ms-3 mt-3">
                                        <div class="col-12 col-md-12">
                                            <input type="text" id="duaBa" style="display:none" name="duaB" class="form-control rounded-3 mt-2" placeholder="Dalam berapa bulan Anda mendapatkan pekerjaan?">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <input type="text" id="duaBb" style="display:none" class="form-control rounded-3 mt-2" name="duaC" placeholder="Berapa rata-rata pendapatan Anda per bulan? (take home pay)?">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="f505">3. Berapa rata-rata pendapatan Anda per bulan? (take home pay)? </label>
                                    <input name="f505" type="text" class="form-control rounded-3 mt-2" id="f505">
                                </div>
                                
                                <div class="form-group">
                                    <label>4. Dimana lokasi tempat Anda bekerja ?</label>
                                    <div class=" custom-radio row ms-3 ">
                                        <div class="col-12 col-md-6">

                                            <select class="form-select" name="f5a1"
                                              id="filter-provinsi" aria-label="Default select example">
                                                <option value="" selected>Pilih Provinsi</option>
                                                @foreach ($provinces as $item)
                                                <option value="{{ $item->id }}" {{ request()->get('provinces') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <select class="form-select rounded-3 mt-2"
                                            name="f5a2" id="filter-kabupaten"
                                            aria-label="Default select example">
                                                <option value="" selected>Pilih Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>5. Apa jenis perusahaan/intansi/institusi tempat anda bekerja
                                        sekarang? </label>

                                        <div class="form-check ps-0 q-box">
                                        <div class="q-box__question">
                                            <input  onchange="toggleOtherdisabled(this,'empat_lainnya')" class="form-check-input question__input" id="empat_1" name="f1101" type="radio" value="1"> 
                                            <label class="form-check-label question__label" for="empat_1">Intansi pemerintah</label>
                                        </div>
                                        <div class="q-box__question">
                                            <input  onchange="toggleOtherdisabled(this,'empat_lainnya')" class="form-check-input question__input" id="empat_2" name="f1101" type="radio" value="6"> 
                                            <label class="form-check-label question__label" for="empat_2">BUMN/BUMD</label>
                                        </div>
                                        <div class="q-box__question">
                                            <input  onchange="toggleOtherdisabled(this,'empat_lainnya')" class="form-check-input question__input" id="empat_3" name="f1101" type="radio" value="7"> 
                                            <label class="form-check-label question__label" for="empat_3">Institusi/Organisasi Multilateral</label>
                                        </div>
                                        <div class="q-box__question">
                                            <input  onchange="toggleOtherdisabled(this,'empat_lainnya')" class="form-check-input question__input" id="empat_4" name="f1101" type="radio" value="2"> 
                                            <label class="form-check-label question__label" for="empat_4">Organisasi non-profit/Lembaga Swadaya Masyarakat</label>
                                        </div>
                                        
                                        <div class="q-box__question">
                                            <input  onchange="toggleOtherdisabled(this,'empat_lainnya')" class="form-check-input question__input" id="empat_5" name="f1101" type="radio" value="3"> 
                                            <label class="form-check-label question__label" for="empat_5">Perusahaan swasta</label>
                                        </div>

                                        <div class="q-box__question">
                                            <input onchange="toggleOtherdisabled(this,'empat_lainnya')" class="form-check-input question__input" id="empat_6" name="f1101" type="radio" value="4"> 
                                            <label class="form-check-label question__label" for="empat_6">Wiraswasta/perusahaan sendiri</label>
                                        </div>

                                        <div class="q-box__question">
                                            <input class="form-check-input question__input" id="empat_7" name="f1101" type="radio" value="5" onchange="toggleOther(this,'empat_lainnya')">
                                            <label class="form-check-label question__label" for="empat_7">Lainnya, Tuliskan</label>
                                        </div>
                                        
                                        <input type="text" id="empat_lainnya" name="f1102" class="form-control rounded-3 mt-2" placeholder="Lainnya, tuliskan" style="display:none">
                                        
                                    </div>
                                

                            </div>

                            
                            <div class="form-group">
                                <label for="lima">6. Apa nama perusahaan/kantor tempat Anda bekerja? </label>
                                <input name="f5b" type="text" class="form-control rounded-3 mt-2" id="lima">
                            </div>

                            
                            <div class="form-group">
                                <label for="enam">7. Bila berwiraswasta, apa posisi/jabatan Anda saat ini?</label>
                                <select name="f5c" id="enam" class="form-control">
                                        <option value="">Pilih Posisi</option>
                                        <option value="1">Founder</option>
                                        <option value="2">Co-Founder</option>
                                        <option value="3">Staff</option>
                                        <option value="4">Freelance/Pekerja Lepas</option>
                                </select>
                            </div>

                            
                            <div class="form-group">
                                <label for="tujuh">8. Apa tingkat tempat kerja Anda? </label>
                                <select name="f5c" id="tujuh" class="form-control">
                                    <option value="">Pilih Posisi</option>
                                    <option value="1">Lokal/Wilayah/Wiraswasta tidak berbadan hukum</option>
                                    <option value="2">Nasional/Wiraswasta Berbadan hukum</option>
                                    <option value="3">Multinasional/Internasional</option>
                                </select>
                            </div>


                            
                            <div class="form-group">
                                <label>9. Pertanyaan studi lanjut</label>
                                <div class=" row py-3">
                                    <div class="col-md-6">
                                        <label for="delapan_biaya">Sumber biaya</label>
                                        <select name="f18a" type="text" class="form-select rounded-3 mt-2" id="delapan_biaya">
                                            <option value="1">Biaya Sendiri</option>
                                            <option value="2">Beasiswa</option>
                                        </select>
                                        <label for="delapan_program" class="mt-3">Program Studi</label>
                                        <input name="f18c" type="text" class="form-control rounded-3 mt-2" id="delapan_program">
                                    </div>
                                    <div class="col-md-6">

                                        <label for="delapan_kampus">Perguruan Tinggi</label>
                                        <input name="f18b" type="text" class="form-control rounded-3 mt-2" id="delapan_kampus">
                                        <label for="delapan_tahun" class="mt-3">Tanggal Masuk</label>
                                        <input name="f18d" type="date" class="form-control rounded-3 mt-2" id="delapan_tahun">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>10. Sebutkan sumberdana dalam pembiayaan kuliah? * (bukan ketika Studi
                                    Lanjut) <span class="text-wajib">(wajib diisi)</span> </label>
                                
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                        <input onchange="toggleOtherdisabled(this,'sembilan_lainnya')" class="form-check-input question__input" id="sembilan_1" name="f1201" type="radio" value="1"> 
                                        <label class="form-check-label question__label" for="sembilan_1">Biaya Sendiri/Keluarga</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input onchange="toggleOtherdisabled(this,'sembilan_lainnya')" class="form-check-input question__input" id="sembilan_2" name="f1201" type="radio" value="2"> 
                                        <label class="form-check-label question__label" for="sembilan_2">Beasiswa ADIK</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input onchange="toggleOtherdisabled(this,'sembilan_lainnya')" class="form-check-input question__input" id="sembilan_3" name="f1201" type="radio" value="3"> 
                                        <label class="form-check-label question__label" for="sembilan_3">Beasiswa BIDIKMISI</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input onchange="toggleOtherdisabled(this,'sembilan_lainnya')" class="form-check-input question__input" id="sembilan_4" name="f1201" type="radio" value="4"> 
                                        <label class="form-check-label question__label" for="sembilan_4">Beasiswa PPA</label>
                                    </div>
                                    
                                    <div class="q-box__question">
                                        <input onchange="toggleOtherdisabled(this,'sembilan_lainnya')" class="form-check-input question__input" id="sembilan_5" name="f1201" type="radio" value="5"> 
                                        <label class="form-check-label question__label" for="sembilan_5">Beasiswa AFIRMASI</label>
                                    </div>

                                    <div class="q-box__question">
                                        <input onchange="toggleOtherdisabled(this,'sembilan_lainnya')" class="form-check-input question__input" id="sembilan_6" name="f1201" type="radio" value="6"> 
                                        <label class="form-check-label question__label" for="sembilan_6">Beasiswa Perusahaan/Swasta</label>
                                    </div>

                                    <div class="q-box__question">
                                        <input onchange="toggleOther(this,'sembilan_lainnya')" class="form-check-input question__input" id="sembilan_7" name="f1201" type="radio" value="7"> 
                                        <label class="form-check-label question__label" for="sembilan_7">Lainnya, Tuliskan</label>
                                    </div>
                                    
                                    <input style="display:none" type="text" id="sembilan_lainnya" name="f1202" class="form-control rounded-3 mt-2" placeholder="Lainnya, tuliskan">
                                    
                                    <script>
                                        function toggleOther(cb, target){
                                            if(cb.checked){
                                                document.getElementById(target).style.display = 'block';
                                            }else{
                                                document.getElementById(target).style.display = 'none';
                                            }
                                        }

                                
                                        function toggleOtherdisabled(cb, target){
                                            if(cb.checked){
                                                document.getElementById(target).style.display = 'none';
                                            }else{
                                                document.getElementById(target).style.display = 'block';
                                            }
                                        }

                                        function toggleOtherdua(cb, targeta, targetb){
                                            if(cb.checked){
                                                document.getElementById(targeta).style.display = 'block';
                                                document.getElementById(targetb).style.display = 'block';
                                            }else{
                                                document.getElementById(targeta).style.display = 'none';
                                                document.getElementById(targetb).style.display = 'none';
                                            }
                                        }

                                        function toggleOtherduadisabled(cb, targeta, targetb){
                                            if(cb.checked){
                                                document.getElementById(targeta).style.display = 'none';
                                                document.getElementById(targetb).style.display = 'none';
                                            }else{
                                                document.getElementById(targeta).style.display = 'block';
                                                document.getElementById(targetb).style.display = 'block';
                                            }
                                        }

                                        
                                        function toggleOtherempatbelas(cb, targeta, targetb){
                                            if(cb.checked){
                                                document.getElementById(targeta).style.display = 'block';
                                                document.getElementById(targetb).style.display = 'none';
                                            }else{
                                                document.getElementById(targeta).style.display = 'none';
                                                document.getElementById(targetb).style.display = 'block';
                                            }
                                        }
                                    </script>

                                </div>
                                
                            </div>

                            
                            <div class="form-group">
                                <label>11. Seberapa erat hubungan bidang studi dengan pekerjaan anda? <span class="text-wajib">(wajib diisi)</span></label>
                                
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="sepuluh_1" name="f14" type="radio" value="1"> 
                                        <label class="form-check-label question__label" for="sepuluh_1">Sangat Erat </label>
                                    </div>
                                    <div class="q-box__question">
                                        <input  class="form-check-input question__input" id="sepuluh_2" name="f14" type="radio" value="2"> 
                                        <label class="form-check-label question__label" for="sepuluh_2">Erat</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input class="form-check-input question__input" id="sepuluh_3" name="f14" type="radio" value="3"> 
                                        <label class="form-check-label question__label" for="sepuluh_3">Cukup Erat</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input class="form-check-input question__input" id="sepuluh_4" name="f14" type="radio" value="4"> 
                                        <label class="form-check-label question__label" for="sepuluh_4">Kurang Erat</label>
                                    </div>
                                    
                                    <div class="q-box__question">
                                        <input class="form-check-input question__input" id="sepuluh_5" name="f14" type="radio" value="5"> 
                                        <label class="form-check-label question__label" for="sepuluh_5">Tidak Sama Sekali</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                      </div> 
                    </div><!-- Tutup Step -->

         