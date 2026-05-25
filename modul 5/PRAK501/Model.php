<?php

// Member
function getMemberData($conn) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM member");

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_stmt_close($stmt);
            return $data;
        }
        mysqli_stmt_close($stmt);
    }
    return [];
}

function getMemberById($conn, $id_member) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM member WHERE id_member = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_member);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result) ?: null;
        mysqli_stmt_close($stmt);
        return $row;
    }
    return null;
}

function addMemberData($conn, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $query = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssss", $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Preparation failed: " . mysqli_error($conn));
    }
}

function deleteMemberById($conn, $id_member) {
    $stmt = mysqli_prepare($conn, "DELETE FROM member WHERE id_member = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_member);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    return null;
}

function updateMemberData($conn, $id_member, $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar) {
    $query = "UPDATE member SET nama_member = ?, nomor_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ? WHERE id_member = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $nama_member, $nomor_member, $alamat, $tgl_mendaftar, $tgl_terakhir_bayar, $id_member);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Preparation failed: " . mysqli_error($conn));
    }
}

// BUKU

function getBukuData($conn) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM buku");

    if ($stmt) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_stmt_close($stmt);
            return $data;
        }
        mysqli_stmt_close($stmt);
    }
    return [];
}

function getBukuById($conn, $id_buku) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM buku WHERE id_buku = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_buku);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result) ?: null;
        mysqli_stmt_close($stmt);
        return $row;
    }
    return null;
}

function addBukuData($conn, $judul_buku, $penulis, $penerbit, $tahun_terbit) {
    $query = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $judul_buku, $penulis, $penerbit, $tahun_terbit);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Preparation failed: " . mysqli_error($conn));
    }
}

function updateBukuData($conn, $id_buku, $judul_buku, $penulis, $penerbit, $tahun_terbit) {
    $query = "UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssii", $judul_buku, $penulis, $penerbit, $tahun_terbit, $id_buku);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Preparation failed: " . mysqli_error($conn));
    }
}

function deleteBukuById($conn, $id_buku) {
    $stmt = mysqli_prepare($conn, "DELETE FROM buku WHERE id_buku = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_buku);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    return null;
}

// PEMINJAMAN
function getPeminjamanData($conn) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM peminjaman");
    if ($stmt) {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_stmt_close($stmt);
            return $data;
        }
        mysqli_stmt_close($stmt);
    }
    return [];
}

function getPeminjamanById($conn, $id_peminjaman) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_peminjaman);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result) ?: null;
        mysqli_stmt_close($stmt);
        return $row;
    }
    return null;
}

function addPeminjamanData($conn, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {
    $query = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, id_member, id_buku) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssii", $tgl_pinjam, $tgl_kembali, $id_member, $id_buku);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Preparation failed: " . mysqli_error($conn));
    }
}

function updatePeminjamanData($conn, $id_peminjaman, $tgl_pinjam, $tgl_kembali, $id_member, $id_buku) {
    $query = "UPDATE peminjaman SET tgl_pinjam = ?, tgl_kembali = ?, id_member = ?, id_buku = ? WHERE id_peminjaman = ?";
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiii", $tgl_pinjam, $tgl_kembali, $id_member, $id_buku, $id_peminjaman);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        die("Preparation failed: " . mysqli_error($conn));
    }
}

function deletePeminjamanById($conn, $id_peminjaman) {
    $stmt = mysqli_prepare($conn, "DELETE FROM peminjaman WHERE id_peminjaman = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_peminjaman);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    return null;
}
?>