<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>CSMUH CRS Cancer Database</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
        .table-container {
            max-height: 300px;
            overflow-y: auto;
        }
        
        table {
            table-layout: fixed; /* 固定表格布局 */
            width: 100%; /* 表格宽度占满容器 */
            border: 3px #cccccc solid;
            text-align: center;
        }

        th, td {
          text-align: center;
            padding: 8px; /* 添加单元格内边距 */
        }

        th {
            font-size: 16px;
            white-space: nowrap;
        }

        th:nth-child(1), td:nth-child(1) { width: 25%; }
        th:nth-child(2), td:nth-child(2) { width: 25%; }
        th:nth-child(4), td:nth-child(4) { width: 25%; }
        th:nth-child(5), td:nth-child(5) { width: 25%; }
      </style>

  </head>
  <body>
    <h1>CSMUH CRS Cancer Database</h1>
    <hr/>
    <div class="table-container">
   <table cellpadding="10" border="1">
      <tr>
        <th width="20%">Chart</th>
        <th width="20%">Name</th>
        <th width="20%">Edit time</th>
        <th width="20%">Creater</th>
      </tr>
      <?php
        require_once('conn.php');
        $query = "SELECT * FROM basic_information ORDER BY `Time` DESC";
        $result = mysqli_query($link, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>".$row['Chart'] ."</td>";
              echo "<td>".$row['Name']  ."</td>"; 
              echo "<td>".$row['Time']  ."</td>";
              echo "<td>".$row['creater']."</td>";
              echo "</tr>";
            }
            mysqli_free_result($result);
        } else {
            echo "查询失败：" . mysqli_error($link);
        }
        mysqli_close($link);
      ?>
    </table>
    </div>
  </body>
</html>
