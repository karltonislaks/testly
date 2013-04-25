//võtab id tests_index_view.php'st.
function remove_test_ajax(id) {
	//saadab serverile pärinug ilma sisuta
	$.post(BASE_URL + "tests/remove/" + id)

		// .done saab vajaliku info .post'ilt ja salvestab data'sse
		.done(function (data) {
			if (data == 'OK') {
				$('table#tests-table>tbody>tr#test' + id).remove();
				alert("Test kustutatud")

			}
		else{
				alert("Viga\n\nServer vastas: '" + data + "'.\n\nKontakteeru arendajaga.");
			}
		});
}
