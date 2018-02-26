import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EierListeComponent } from './eier-liste.component';

describe('EierListeComponent', () => {
  let component: EierListeComponent;
  let fixture: ComponentFixture<EierListeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EierListeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EierListeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
