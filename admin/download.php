<?php 
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
	header("Location: index.php"); //
	}
	else{?>
	
<style>
#exportMe {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#exportMe td, #exportMe th {
  border: 1px solid #ddd;
  padding: 8px;
}

#exportMe tr:nth-child(even){background-color: #f2f2f2;}

#exportMe tr:hover {background-color: #ddd;}

#exportMe th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>	
<head>
	
	<title>Table</title>

	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	
</head>

<body style="padding:50px;">
	

  <div    style="height:50px;"></div>
    
  <div class="border border-light p-3 mb-4" >

    <div class="text-center">
      <button id="export" type="button" class="btn btn-primary">Export as csv</button>
    </div>

  </div>
  
  <div    style="height:50px;"> </div>
	

<table  id="exportMe" border="1" >
									<thead>
										<tr>
										<th>#</th>
												<th>Name</th>
                                                <th>Email</th>
                                                <th>Branch</th>
                                                <th>Batch</th>
                                                <th>Phone</th>
                                                <th>Pref 1</th>
                                                <th>Pref 2</th>
                                                <th>Pref 3</th>
                                                <th>Pref 4</th>
												<th>Why ISTE</th>
												<th>Text</th>
										</tr>
									</thead>

<?php 
$filename="Users list";
$sql = "SELECT * from users";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				

echo '  
<tr>  
<td>'.$cnt.'</td> 
<td>'.$Name= $result->name.'</td> 
<td>'.$Email= $result->email.'</td>
<td>'.$Name= $result->branch.'</td> 
<td>'.$Email= $result->batch.'</td> 
<td>'.$Phone= $result->mobile.'</td> 
<td>'.$Name= $result->prefa.'</td> 
<td>'.$Email= $result->prefb.'</td>
<td>'.$Name= $result->prefc.'</td> 
<td>'.$Email= $result->prefd.'</td>
<td>'.$Name= $result->why.'</td> 
<td>'.$Email= $result->text.'</td> 					
</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<script>
    const toCsv = function(table) {
        // Query all rows
        const rows = table.querySelectorAll('tr');
    
        return [].slice.call(rows)
            .map(function(row) {
                // Query all cells
                const cells = row.querySelectorAll('th,td');
                return [].slice.call(cells)
                    .map(function(cell) {
                        return cell.textContent;
                    })
                    .join(',');
            })
            .join('\n');
    };
    
    
    const download = function(text, fileName) {
        const link = document.createElement('a');
        link.setAttribute('href', `data:text/csv;charset=utf-8,${encodeURIComponent(text)}`);
        link.setAttribute('download', fileName);
    
        link.style.display = 'none';
        document.body.appendChild(link);
    
        link.click();
    
        document.body.removeChild(link);
    };
    
    const table = document.getElementById('exportMe');
    const exportBtn = document.getElementById('export');
    
    exportBtn.addEventListener('click', function() {
        
        exportBtn.value="Loading CSV....";
        // Export to csv
        const csv = toCsv(table);
    
        // Download it
        download(csv, 'download.csv');
        exportBtn.value="Export as csv";
    });
</script>
</body>

<?php } ?>