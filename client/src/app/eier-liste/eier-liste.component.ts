import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';


const ORDERS = {
  string: (a: string, b: string) => {
    if (a == null) return 1;
    if (b == null) return -1;
    return a.localeCompare(b);
  },
  number: (a: any, b: any) => {
    if (a == null) return 1;
    if (b == null) return -1;
    return parseInt(a) - parseInt(b);
  }
}

const order = (field: string, type: string, array: any[]): any[] => {
  array.sort((a, b) => {
    return ORDERS[type](a[field], b[field]);
  });
  return array;
}

@Component({
  selector: 'eier-liste',
  templateUrl: './eier-liste.component.html',
  styleUrls: ['./eier-liste.component.css']
})
export class EierListeComponent implements OnInit {

  constructor(private http: HttpClient) { }

  search: string = '';
  private fullList: any[] = Array();
  private order: any = { field: 'name', type: 'string', reversed: false };
  
  orderList(field: string, type: string) {
    if (this.order.field == field) {
      this.order.reversed = !this.order.reversed;
    } else {
      this.order.reversed = false;
    }
    this.order.field = field;
    this.order.type = type;
  }

  searchFor(search: string)  {
    this.search = search;
  }

  get list(): any[] {
    let returnAble: any[] = this.fullList.slice();

    returnAble = returnAble.filter(look => look.name.toLowerCase().indexOf(this.search.toLowerCase()) != -1);
    returnAble = order(this.order.field, this.order.type, returnAble);

    if (this.order.reversed) returnAble.reverse();
    return returnAble;
  }

  getIcon(order): string {
    if (order == this.order.field && !this.order.reversed) {
      return "long-arrow-down";
    } else if (order == this.order.field) {
      return "long-arrow-up";
    } else {
      return "arrows-v";
    }
  }

  ngOnInit() {
/*
   // this.http.get('/EggManagerISO15/api/egg.php').subscribe(console.log);
    this.fullList = [];
    this.fullList = [
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
      },
      {
        id: '3',
        name: 'Naseböög',
        color: 'blauuuu',
        size: 'insane',
        type: 'gruusig',
        weight: 29.77
      },
      {
        id: '4',
        name: 'Janiggerere',
        color: 'grchüee',
        size: 'medium-small-big',
        type: 'nümme guet',
        weight: 22.21
      }
    ];
*/
    this.fullList = [];
    this.http.get('/EggManagerISO15/api/egg.php').subscribe((eier: any[]) => this.fullList = eier);

  }

  refresh() {
    this.http.get('/EggManagerISO15/api/egg.php').subscribe((eier: any[]) => this.fullList = eier);
  }
}
