import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { MatDialog } from '@angular/material/dialog';
import { MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'eier-detail',
  templateUrl: './eier-detail.component.html',
  styleUrls: ['./eier-detail.component.css'],
})

export class EierDetailComponent {

  constructor(@Inject(MAT_DIALOG_DATA) public data: any, private http: HttpClient) { }

  delete() {
    this.getPostRequest(this.data.eggId, 'delete', 'egg').subscribe(data => console.log(data), err => console.error(err));
  }

  getPostRequest(data, action, command) {
    return this.postRequest('http://localhost:8080/controller/php/ajaxHandler.php', data, action, command);
  }

  postRequest(url, data, action, command) {
    return this.http.post(url, {array: JSON.stringify(data), action: action, command: command});
  } 

}