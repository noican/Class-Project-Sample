<form method="POST" action="index.php">
	<table>
		<tbody>
			<tr>
				<td><h2>Assignment 2</h2></td>
			</tr>
			<tr>
				<td>Income/Expense:</td>
			</tr>
			<tr>
				<td>
					<select id='myType' name='myType'>
						<option value='Income'>Income</option>
						<option value='Expense'>Expense</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Item</td>
			</tr>
			<tr>
				<td><input type='text' id='myItem' name='myItem' size='30' maximum='30'></input></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Category:</td>
			</tr>
			<tr>
				<td>
					<select id='myCategory' name='myCategory'>
						<option value='-'>-</option>
						<option value='01'>Paycheck</option>
						<option value='02'>Stock</option>
						<option value='03'>Rent</option>
						<option value='04'>Food</option>
						<option value='05'>Gas</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Amount</td>
			</tr>
			<tr>
				<td><input type='text' id='myAmount' name='myAmount' size='30' maximum='30'></input></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><input type='submit' id='btnaddTransaction' name='btnaddTransaction' value='Add Transaction'></input></td>
			</tr>
		</tbody>
	</table>
	
</form>