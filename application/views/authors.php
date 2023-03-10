<!DOCTYPE html>
<html>
<head>
	<title>Table Template</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 1rem;
			font-size: 1rem;
			text-align: left;
			border-radius: 0.5rem;
			box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
			overflow: hidden;
		}

		table th,
		table td {
			padding: 1rem;
			vertical-align: top;
			border: none;
			font-weight: normal;
			position: relative;
			transition: all 0.3s ease-in-out;
		}

		table th {
			background-color:gray;
			color: white;
			font-weight: 600;
			text-transform: uppercase;
			letter-spacing: 0.1rem;
			border-bottom: 1px solid #e1e6e8;
			padding-top: 1.5rem;
			padding-bottom: 1rem;
			z-index: 1;
		}

		table tbody tr:hover td {
			background-color: #f9fafb;
		}

		table tbody tr:last-child td {
			border-bottom: none;
		}
        .pagination {
  margin: 0;
  padding: 0;
  list-style: none;
  display: flex;
  justify-content: center;
  align-items: center;
}

.pagination li {
  margin: 0 5px;
}

.pagination a {
  display: inline-block;
  padding: 10px;
  border-radius: 5px;
  background-color: #f9f9f9;
  color: #333;
  text-decoration: none;
  transition: background-color 0.2s ease;
}


	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Address</th>
			</tr>
		</thead>
		<tbody>
            <?php foreach($author as $authors):?>

			<tr>
				<td><?= $authors->id?></td>
				<td><?= $authors->first_name?></td>
                <td><?= $authors->last_name?></td>
                <td><?= $authors->email?></td>
                <td><?= $authors->birthdate?></td>
                <td><?= $authors->added?></td>
			</tr>
            <?php endforeach; ?>
        </tbody> 
    </table>
    <?= $links?>
</body>
</html>
		
