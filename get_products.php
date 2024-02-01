<?php

$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($conn->connect_error) {
    $error = array('error' => '連接失敗: ' . $conn->connect_error);
    echo json_encode($error);
    die();
}

// 準備 SQL 查詢語句
$sql = "SELECT * FROM seller";

// 執行查詢
$result = $conn->query($sql);

// 檢查查詢結果是否存在
if ($result) {
    if ($result->num_rows > 0) {
        $sellersArray = array(); // 建立一個空陣列，用來存放所有賣家的資料

        // 迭代輸出每一位賣家的資料
        while ($row = $result->fetch_assoc()) {
            // 將每位賣家的資料添加到陣列中
            $sellerData = array(
                'seller_id' => $row["seller_id"],
                'name' => $row["name"],
                'imageUrl' => $row["imageUrl"],
                'price' => $row["price"],
                'id' => $row["id"]
            );

            // 將賣家資料陣列添加到主陣列中
            $sellersArray[] = $sellerData;
        }

        // 轉換陣列為 JSON 格式
        echo json_encode($sellersArray, JSON_UNESCAPED_UNICODE);
    } else {
        echo "沒有找到任何賣家資料";
    }
} else {
    $error = array('error' => '查詢失敗: ' . $conn->error);
    echo json_encode($error);
}

// 關閉資料庫連接
$conn->close();
?>
