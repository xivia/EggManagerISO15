import { Component, OnInit, Inject } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { MatDialog } from '@angular/material/dialog';
import { MAT_DIALOG_DATA } from '@angular/material/dialog';
import { Router } from '@angular/router';
import * as $ from 'jquery';

@Component({
  selector: 'eier-detail',
  templateUrl: './eier-detail.component.html',
  styleUrls: ['./eier-detail.component.css'],
})

export class EierDetailComponent {

  constructor(@Inject(MAT_DIALOG_DATA) public data: any, private http: HttpClient) { }

  delete() {
    this.getPostRequest(this.data.eggId, 'setRip', 'egg');
    this.getPostRequest(this.data.eggId, 'delete', 'egg');
  }

  wirf(){
    this.getPostRequest(JSON.stringify({name: 'threwn fakking ' + this.data.name, color: 1, type: 1,id: this.data.eggId, weight: 1337}), 'updateEgg', 'egg');
  }

  eat() {
    this.getPostRequest(this.data.eggId, 'eatEgg', 'egg');
  }

  x2(){
    this.getPostRequest({name: this.data.name, color: this.data.eggColor, type: this.data.eggType, weight: this.data.weight, size: 3}, 'add', 'egg');
  }

  getPostRequest(data, action, command) {
    return this.postRequest('http://localhost:8080/controller/php/ajaxHandler.php', data, action, command);
  }

  postRequest(url, data, action, command) {
    let x = $.post(url, {array: JSON.stringify(data), action: action, command: command});
    console.log(x)
    window.location.reload();
  } 

}