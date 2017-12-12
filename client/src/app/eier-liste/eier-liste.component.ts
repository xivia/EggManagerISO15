import { Component } from '@angular/core';

@Component({
  selector: 'eier-liste',
  templateUrl: './eier-liste.component.html',
  styleUrls: ['./eier-liste.component.css']
})
export class EierListeComponent {

  constructor() { }

  eierArray = [
    {
      id: '1',
      name: 'Eiophor',
      color: 'wachsgrüün',
      size: 'medium',
      type: 'verdorben',
      weight: 23.83
    },
    {
      id: '2',
      name: 'Eiophortsch',
      color: 'wachsggelb',
      size: 'medium-small',
      type: 'auch verdorben',
      weight: 23.23
    }
  ]; 


}
