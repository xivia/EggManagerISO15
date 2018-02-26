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

  constructor(@Inject(MAT_DIALOG_DATA) public data: any) { }

}