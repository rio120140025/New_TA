function sortTable(columnIndex) {
    const table = document.querySelector('table');
    const rows = Array.from(table.querySelectorAll('tr'));
    const isAscending = table.querySelector('th').classList.contains('asc');
  
    rows.shift();
  
    rows.sort((a, b) => {
      const aValue = a.cells[columnIndex].textContent.trim();
      const bValue = b.cells[columnIndex].textContent.trim();
  
      if (aValue.localeCompare(bValue) === 1) {
        return isAscending ? 1 : -1;
      } else {
        return isAscending ? -1 : 1;
      }
    });
  
    if (isAscending) {
      table.querySelector('th').classList.remove('asc');
      table.querySelector('th').classList.add('desc');
    } else {
      table.querySelector('th').classList.remove('desc');
      table.querySelector('th').classList.add('asc');
    }
  
    table.querySelector('tbody').innerHTML = '';
    rows.forEach(row => table.querySelector('tbody').appendChild(row));
  }
  