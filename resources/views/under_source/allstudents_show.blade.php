<%
for(var i=0; i < branches_list.length; i++){
	if(obj.branch == branches_list[i].id){
		var student_branch = branches_list[i].branch;
		break;
	}
	
}

for(var i=0; i < categories_list.length; i++){
	if(obj.category == categories_list[i].cat_id){
		var student_category = categories_list[i].category;
		break;
	}
}

var student_year = obj.year.toString();
student_year = student_year.trim().substring(2,4);
%>

<%
/**
 * "student_year" is converted to a string and then processed
 * to get the last 2 digits of the year
 * eg : 12 instead of 2012
 */
%>

<tr data-student-id="<%= obj.student_id %>">
    <td class="align-middle text-center">
        <div class="d-flex flex-column justify-content-center">
            <p class="text-xs text-secondary mb-0"><%= obj.student_id %></p>
        </div>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.first_name %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.last_name %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.roll_num %>-<%= student_year %></span>
    </td>
    <td class="align-middle text-center">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.branch %></span>
    </td>
    <td class="align-middle text-center text-sm">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.category %></span>
    </td>
	<td class="align-middle text-center text-sm">
        <span class="text-secondary text-sm font-weight-bold"><%= obj.email_id %></span>
    </td>
	<td class="align-middle text-center text-sm">
		<button type="button" class="btn bg-gradient-success student-status" disabled><%= obj.books_issued %></button>
    </td>
</tr>